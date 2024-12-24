<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\Islamic;
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

class IslamicTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Islamic::class)
            ->setView('admin.islamic.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.islamic.edit'),
                DeleteAction::make()->route('admin.zameenlocator.islamic.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('ayat')->title('Quran')->alignLeft(),
                NameColumn::make('trans')->title('Translation')->alignLeft(),
                NameColumn::make('hadess')->title('Hadees')->alignLeft(),
                NameColumn::make('translation')->title('Translation')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'ayat',
                    'trans',
                    'hadess',
                    'translation',
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                    ->table
                    ->eloquent($this->query())
                    ->editColumn('ayat', function (Islamic $item) {
                        $ayat = Html::link(route('admin.zameenlocator.islamic.edit', $item->getKey()), BaseHelper::clean($item->ayat));

                        return $ayat;
                    })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.islamic.create'), 'admin.zameenlocator.islamic.create');
    }
}
