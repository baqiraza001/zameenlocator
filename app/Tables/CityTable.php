<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\City;
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

class CityTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(City::class)
            ->setView('admin.cities.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.cities.edit'),
                DeleteAction::make()->route('admin.zameenlocator.cities.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('city_name')->title('City Name')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'city_name',
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('city_name', function (City $item) {
                            $city_name = Html::link(route('admin.zameenlocator.cities.edit', $item->getKey()), BaseHelper::clean($item->city_name));

                            return $city_name;
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.cities.create'), 'admin.zameenlocator.cities.create');
    }
}
