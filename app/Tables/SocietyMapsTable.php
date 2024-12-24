<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\SocietyMap;
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

class SocietyMapsTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(SocietyMap::class)
            ->setView('admin.society-maps.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.society-maps.edit'),
                DeleteAction::make()->route('admin.zameenlocator.society-maps.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('society_map_name', 'society_map_name')->title('Society Map Name')->alignLeft(),
                NameColumn::make('district', 'district')->title('District')->alignLeft(),
                NameColumn::make('city_id','city_id')->title('City')->alignLeft(),
                NameColumn::make('master_plan','master_plan')->title('Master Plan')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'society_map_name',
                    'district',
                    'city_id',
                    'master_plan'
                ])->with(['city', 'districtRelation']);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('society_map_name', function (SocietyMap $item) {
                            $society_map_name = Html::link(route('admin.zameenlocator.society-maps.edit', $item->getKey()), BaseHelper::clean($item->society_map_name));

                            return $society_map_name;
                        })
                        ->editColumn('district', function (SocietyMap $item) {
                            return optional($item->districtRelation)->district_name ?: '';
                        })
                        ->editColumn('city_id', function (SocietyMap $item) {
                            return optional($item->city)->city_name ?: '';
                        })
                        ->editColumn('master_plan', function (SocietyMap $item) {
                            if(!empty($item->master_plan))
                                return '<img src="'.asset(SocietyMap::SOCIETY_MAPS_PATH . $item->master_plan).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(SocietyMap::SOCIETY_MAPS_PATH."dp.png").'" style="height:70px;">';
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.society-maps.create'), 'admin.zameenlocator.society-maps.create');
    }
}
