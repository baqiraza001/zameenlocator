<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\CityMasterPlan;
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

class HomeImageTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(CityMasterPlan::class)
            ->setView('admin.city-master-plan.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.city-master-plan.edit'),
                DeleteAction::make()->route('admin.zameenlocator.city-master-plan.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('name')->title('Name')->alignLeft(),
                NameColumn::make('img')->title('Picture')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'img',
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('name', function (CityMasterPlan $item) {
                            $name = Html::link(route('admin.zameenlocator.city-master-plan.edit', $item->getKey()), BaseHelper::clean($item->name));

                            return $name;
                        })
                        ->editColumn('img', function (CityMasterPlan $item) {
                            if(!empty($item->img))
                                return '<img src="'.asset(CityMasterPlan::CITY_MASTER_PLAN_IMAGES_PATH . $item->img).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(CityMasterPlan::CITY_MASTER_PLAN_IMAGES_PATH."dp.png").'" style="height:70px;">';
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.city-master-plan.create'), 'admin.zameenlocator.city-master-plan.create');
    }
}
