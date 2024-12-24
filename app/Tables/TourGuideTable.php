<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\TourGuide;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\Column;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\StatusColumn;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class TourGuideTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(TourGuide::class)
            ->setView('admin.tour-guides.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.tour-guides.edit'),
                DeleteAction::make()->route('admin.zameenlocator.tour-guides.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('name')->title('Name')->alignLeft(),
                NameColumn::make('des')->title('Description')->alignLeft(),
                NameColumn::make('country')->title('Country')->alignLeft(),
                NameColumn::make('city')->title('City')->alignLeft(),
                NameColumn::make('tour_image', 'image')->title('Image')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'des',
                    'country',
                    'city',
                    'image as tour_image',
                ])->with(['cityRelation', 'countryRelation']);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('name', function (TourGuide $item) {
                            $name = Html::link(route('admin.zameenlocator.tour-guides.edit', $item->getKey()), BaseHelper::clean($item->name));

                            return $name;
                        })
                        ->editColumn('city', function (TourGuide $item) {
                            return optional($item->cityRelation)->city_name ?: '';
                        })
                        ->editColumn('country', function (TourGuide $item) {
                            return optional($item->countryRelation)->name ?: '';
                        })
                        ->editColumn('tour_image', function (TourGuide $item) {
                            if(!empty($item->tour_image))
                                return '<img src="'.asset(TourGuide::TOUR_GUIDE_IMAGES_PATH . $item->tour_image).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(TourGuide::TOUR_GUIDE_IMAGES_PATH."dp.png").'" style="height:70px;">';
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.tour-guides.create'), 'admin.zameenlocator.tour-guides.create');
    }
}
