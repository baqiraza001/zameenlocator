<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\Country;
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

class CountryTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Country::class)
            ->setView('admin.countries.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.countries.edit'),
                DeleteAction::make()->route('admin.zameenlocator.countries.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('name')->title('Country Name')->alignLeft(),
                NameColumn::make('code')->title('Country Code')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'code',
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('name', function (Country $item) {
                            $name = Html::link(route('admin.zameenlocator.countries.edit', $item->getKey()), BaseHelper::clean($item->name));

                            return $name;
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.countries.create'), 'admin.zameenlocator.countries.create');
    }
}
