<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\Popup;
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

class PopupTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Popup::class)
            ->setView('admin.popups.index')
            ->addActions([
                EditAction::make()->route('admin.zameenlocator.popups.edit'),
                DeleteAction::make()->route('admin.zameenlocator.popups.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make('h1')->title('Heading')->alignLeft(),
                NameColumn::make('des')->title('Description')->alignLeft(),
                NameColumn::make('popup_image', 'image')->title('Image')->alignLeft(),
                NameColumn::make('popup_status', 'status')->title('Publish/Unpublish')->alignLeft(),
            ])
            ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'h1',
                    'des',
                    'image as popup_image',
                    'status as popup_status',
                ]);
            })
            ->onAjax(function (): JsonResponse {
                return $this->toJson(
                    $this
                        ->table
                        ->eloquent($this->query())
                        ->editColumn('name', function (Popup $item) {
                            $name = Html::link(route('admin.zameenlocator.popups.edit', $item->getKey()), BaseHelper::clean($item->name));

                            return $name;
                        })
                        ->editColumn('popup_image', function (Popup $item) {
                            if(!empty($item->popup_image))
                                return '<img src="'.asset(Popup::POPUP_IMAGES_PATH . $item->popup_image).'" style="height:70px; object-fit:contain;">';
                            else
                                return '<img src="'.asset(Popup::POPUP_IMAGES_PATH."dp.png").'" style="height:70px;">';
                        })
                        ->editColumn('popup_status', function (Popup $item) {
                            $actionUrl = route('admin.zameenlocator.popups.update-status', $item->id);
                            $statusButton = (isset($item->popup_status) && $item->popup_status == 0) 
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
        return $this->addCreateButton(route('admin.zameenlocator.popups.create'), 'admin.zameenlocator.popups.create');
    }
}
