<?php

namespace App\Tables;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\Society;
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

class SocietyTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Society::class)
            ->setView('admin.societies.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.societies.edit'),
                DeleteAction::make()->route('admin.zameenlocator.societies.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('society_name', 'society_name')->title('Society Name')->alignLeft(),
                NameColumn::make('district', 'district')->title('District')->alignLeft(),
                NameColumn::make('city_id','city_id')->title('City')->alignLeft(),
                NameColumn::make('society_status', 'status')->title('Status')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'society_name',
                    'district',
                    'city_id',
                    'status as society_status'
                ])->with(['city', 'districtRelation']);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('society_name', function (Society $item) {
                            $society_name = Html::link(route('admin.zameenlocator.societies.edit', $item->getKey()), BaseHelper::clean($item->society_name));

                            return $society_name;
                        })
                        ->editColumn('district', function (Society $item) {
                            return optional($item->districtRelation)->district_name ?: '';
                        })
                        ->editColumn('city_id', function (Society $item) {
                            return optional($item->city)->city_name ?: '';
                        })
                        ->editColumn('society_status', function (Society $item) {
                            if(!empty($item->society_status) && $item->society_status == 1)
                                return "<span class='status-label label-success'>Legal</span>";
                            else
                                return "<span class='status-label label-danger'>Illegal</span>";
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.societies.create'), 'admin.zameenlocator.societies.create');
    }
}
