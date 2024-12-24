<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\TestimonialSlider;
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

class TestimonialSliderTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(TestimonialSlider::class)
            ->setView('admin.testimonial-sliders.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.testimonial-sliders.edit'),
                DeleteAction::make()->route('admin.zameenlocator.testimonial-sliders.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('name')->title('Name')->alignLeft(),
                NameColumn::make('des')->title('Description')->alignLeft(),
                NameColumn::make('slider_image', 'image')->title('Picture')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'des',
                    'image as slider_image'
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('name', function (TestimonialSlider $item) {
                            $name = Html::link(route('admin.zameenlocator.testimonial-sliders.edit', $item->getKey()), BaseHelper::clean($item->name));

                            return $name;
                        })
                        ->editColumn('slider_image', function (TestimonialSlider $item) {
                            if(!empty($item->slider_image))
                                return '<img src="'.asset(TestimonialSlider::TESTIMONIAL_SLIDER_IMAGES_PATH . $item->slider_image).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(TestimonialSlider::TESTIMONIAL_SLIDER_IMAGES_PATH."dp.png").'" style="height:70px;">';
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.testimonial-sliders.create'), 'admin.zameenlocator.testimonial-sliders.create');
    }
}
