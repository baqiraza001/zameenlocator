<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\CountryMap;
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

class CountryMapTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(CountryMap::class)
            ->setView('admin.countries-maps.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.countries-maps.edit'),
                DeleteAction::make()->route('admin.zameenlocator.countries-maps.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('name')->title('Name')->alignLeft(),
                NameColumn::make('flag')->title('Flag')->alignLeft(),
                NameColumn::make('region')->title('Region')->alignLeft(),
                NameColumn::make('population')->title('Population')->alignLeft(),
                NameColumn::make('capital')->title('Capital')->alignLeft(),
                NameColumn::make('price')->title('Price')->alignLeft(),
                NameColumn::make('map')->title('Map')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'region',
                    'population',
                    'capital',
                    'price',
                    'flag',
                    'map',
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('name', function (CountryMap $item) {
                            $name = Html::link(route('admin.zameenlocator.countries-maps.edit', $item->getKey()), BaseHelper::clean($item->name));

                            return $name;
                        })
                        ->editColumn('price', function (CountryMap $item) {
                            if(!empty($item->price))
                                return '$'.$item->price;
                        })
                        ->editColumn('flag', function (CountryMap $item) {
                            if(!empty($item->flag))
                                return '<img src="'.asset(CountryMap::COUNTRY_MAP_FLAG_IMAGES_PATH . $item->flag).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(CountryMap::COUNTRY_MAP_FLAG_IMAGES_PATH."dp.png").'" style="height:70px;">';
                        })
                        ->editColumn('map', function (CountryMap $item) {
                            if(!empty($item->map))
                                return '<img src="'.asset(CountryMap::COUNTRY_MAP_MAP_IMAGES_PATH . $item->map).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(CountryMap::COUNTRY_MAP_MAP_IMAGES_PATH."dp.png").'" style="height:70px;">';
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.countries-maps.create'), 'admin.zameenlocator.countries-maps.create');
    }
}
