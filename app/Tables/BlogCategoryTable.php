<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\BlogCategory;
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

class BlogCategoryTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(BlogCategory::class)
            ->setView('admin.blogs-categories.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.blogs-categories.edit'),
                DeleteAction::make()->route('admin.zameenlocator.blogs-categories.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('category')->title('Category Name')->alignLeft(),
                NameColumn::make('img')->title('Picture')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'category',
                    'img',
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('category', function (BlogCategory $item) {
                            $category = Html::link(route('admin.zameenlocator.blogs-categories.edit', $item->getKey()), BaseHelper::clean($item->category));

                            return $category;
                        })
                        ->editColumn('img', function (BlogCategory $item) {
                            if(!empty($item->img))
                                return '<img src="'.asset(BlogCategory::BLOG_CATEGORIES_IMAGES_PATH . $item->img).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(BlogCategory::BLOG_CATEGORIES_IMAGES_PATH."dp.png").'" style="height:70px;">';
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.blogs-categories.create'), 'admin.zameenlocator.blogs-categories.create');
    }
}