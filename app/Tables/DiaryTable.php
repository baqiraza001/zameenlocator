<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\Diary;
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

class DiaryTable extends TableAbstract
{
    public function setup(): void
    {
        $this
        ->model(Diary::class)
        ->setView('admin.diaries.index')
        ->addActions([
            EditAction::make()->route('admin.zameenlocator.diaries.edit'),
            DeleteAction::make()->route('admin.zameenlocator.diaries.destroy'),
        ])
        ->addColumns([
            IdColumn::make(),
            NameColumn::make('image1')->title('Front Image')->alignLeft(),
            NameColumn::make('image2')->title('Back Image')->alignLeft(),
            NameColumn::make('des')->title('Description')->alignLeft(),
            NameColumn::make('price')->title('Price')->alignLeft(),
            NameColumn::make('diary_status', 'status')->title('Publish/Unpublish')->alignLeft(),
        ])
        ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
        ])
        ->queryUsing(function (Builder $query) {
            $query->select([
                'id',
                'image1',
                'image2',
                'des',
                'price',
                'status as diary_status',
            ]);
        })
        ->onAjax(function (): JsonResponse {
            return $this->toJson(
                $this
                ->table
                ->eloquent($this->query())
                ->editColumn('price', function (Diary $item) {
                    return '$'.$item->price;
                })
                ->editColumn('image1', function (Diary $item) {
                    if(!empty($item->image1))
                        return '<img src="'.asset(Diary::DIARY_IMAGES_PATH . $item->image1).'" style="height:50px; object-fit:contain;">';
                    else
                        return '<img src="'.asset(Diary::DIARY_IMAGES_PATH."dp.png").'" style="height:50px;">';
                })
                ->editColumn('image2', function (Diary $item) {
                    if(!empty($item->image2))
                        return '<img src="'.asset(Diary::DIARY_IMAGES_PATH . $item->image2).'" style="height:50px; object-fit:contain;">';
                    else
                        return '<img src="'.asset(Diary::DIARY_IMAGES_PATH."dp.png").'" style="height:50px;">';
                })
                ->editColumn('diary_status', function (Diary $item) {
                    $actionUrl = route('admin.zameenlocator.diaries.update-status', $item->id);
                    $statusButton = (isset($item->diary_status) && $item->diary_status == 0) 
                    ? '<button type="submit" name="approve" class="btn btn-primary">Publish</button>' 
                    : '<button type="submit" name="disapprove" class="btn btn-success">Unpublish</button>';

                    return '<form method="post" action="'.$actionUrl.'">
                    '.csrf_field().'
                    <input type="hidden" name="_method" value="PUT">
                    '.$statusButton.'
                    </form>';
                })
            );
        });
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('admin.zameenlocator.diaries.create'), 'admin.zameenlocator.diaries.create');
    }
}
