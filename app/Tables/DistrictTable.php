<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\District;
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

class DistrictTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(District::class)
            ->setView('admin.districts.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.districts.edit'),
                DeleteAction::make()->route('admin.zameenlocator.districts.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('district_name')->title('District Name')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'district_name',
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('district_name', function (District $item) {
                            $district_name = Html::link(route('admin.zameenlocator.districts.edit', $item->getKey()), BaseHelper::clean($item->district_name));

                            return $district_name;
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.districts.create'), 'admin.zameenlocator.districts.create');
    }
}
