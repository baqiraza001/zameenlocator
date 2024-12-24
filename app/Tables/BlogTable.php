<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\Blog;
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

class BlogTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Blog::class)
            ->setView('admin.blogs.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.blogs.edit'),
                DeleteAction::make()->route('admin.zameenlocator.blogs.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('name')->title('Name')->alignLeft(),
                NameColumn::make('blog_id')->title('Category')->alignLeft(),
                NameColumn::make('img')->title('Picture')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'blog_id',
                    'img',
                ])->with(['category']);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('name', function (Blog $item) {
                            $name = Html::link(route('admin.zameenlocator.blogs.edit', $item->getKey()), BaseHelper::clean($item->name));

                            return $name;
                        })
                        ->editColumn('blog_id', function (Blog $item) {
                            return optional($item->category)->category ?: '';
                        })
                        ->editColumn('img', function (Blog $item) {
                            if(!empty($item->img))
                                return '<img src="'.asset(Blog::BLOG_IMAGES_PATH . $item->img).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(Blog::BLOG_IMAGES_PATH."dp.png").'" style="height:70px;">';
                        })
                );
            });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.blogs.create'), 'admin.zameenlocator.blogs.create');
    }
}
