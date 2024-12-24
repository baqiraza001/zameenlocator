<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\Template;
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

class TemplateTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Template::class)
            ->setView('admin.templates.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.templates.edit'),
                DeleteAction::make()->route('admin.zameenlocator.templates.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('name')->title('Pdf Name')->alignLeft(),
                NameColumn::make('high')->title('Highlight Text')->alignLeft(),
                NameColumn::make('text')->title('Text')->alignLeft(),
                NameColumn::make('img')->title('File')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'high',
                    'text',
                    'img',
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('name', function (Template $item) {
                            $name = Html::link(route('admin.zameenlocator.templates.edit', $item->getKey()), BaseHelper::clean($item->name));

                            return $name;
                        })
                        ->editColumn('img', function (Template $item) {
                            if(!empty($item->img))
                                return '<img src="'.asset(Template::TEMPLATE_IMAGES_PATH . $item->img).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(Template::TEMPLATE_IMAGES_PATH."dp.png").'" style="height:70px;">';
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.templates.create'), 'admin.zameenlocator.templates.create');
    }
}
