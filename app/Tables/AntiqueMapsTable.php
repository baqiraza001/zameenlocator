<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\AntiqueMap;
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

class AntiqueMapsTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(AntiqueMap::class)
            ->setView('admin.antique-maps.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.antique-maps.edit'),
                DeleteAction::make()->route('admin.zameenlocator.antique-maps.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('name')->title('Name')->alignLeft(),
                NameColumn::make('des')->title('Description')->alignLeft(),
                NameColumn::make('img')->title('Picture')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'des',
                    'img',
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('name', function (AntiqueMap $item) {
                            $name = Html::link(route('admin.zameenlocator.antique-maps.edit', $item->getKey()), BaseHelper::clean($item->name));

                            return $name;
                        })
                        ->editColumn('img', function (AntiqueMap $item) {
                            if(!empty($item->img))
                                return '<img src="'.asset(AntiqueMap::ANTIQUE_MAPS_PATH . $item->img).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(AntiqueMap::ANTIQUE_MAPS_PATH."dp.png").'" style="height:70px;">';
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.antique-maps.create'), 'admin.zameenlocator.antique-maps.create');
    }
}
