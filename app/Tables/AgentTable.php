<?php

namespace App\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use App\Models\Agent;
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

class AgentTable extends TableAbstract
{
    protected bool $hasResponsive = false;

    public function setup(): void
    {
        $this
        ->model(Agent::class)
        ->setView('admin.agents.index')
        ->addActions([
            EditAction::make()->route('admin.zameenlocator.agents.edit'),
            DeleteAction::make()->route('admin.zameenlocator.agents.destroy'),
        ])
        ->addColumns([
            IdColumn::make(),
            NameColumn::make('name')->title('Name')->alignLeft(),
            NameColumn::make('email')->title('Email')->alignLeft(),
            NameColumn::make('contact')->title('Contact')->alignLeft(),
            NameColumn::make('city')->title('City')->alignLeft(),
            NameColumn::make('area')->title('Area')->alignLeft(),
            NameColumn::make('address')->title('Address')->alignLeft(),
            NameColumn::make('agent_status', 'status')->title('Approve/Disapprove')->alignLeft(),
            NameColumn::make('agent_image', 'image')->title('Picture')->alignLeft(),
        ])
        ->addBulkActions([
                // DeleteBulkAction::make()->permission('pages.destroy'),
        ])
        ->queryUsing(function (Builder $query) {
            $query->select([
                'id',
                'name',
                'email',
                'contact',
                'city',
                'area',
                'address',
                'status as agent_status',
                'image as agent_image',
            ])->with(['cityRelation']);
        })
        ->onAjax(function (): JsonResponse {
            return $this->toJson(
                $this
                ->table
                ->eloquent($this->query())
                ->editColumn('name', function (Agent $item) {
                    $name = Html::link(route('admin.zameenlocator.agents.edit', $item->getKey()), BaseHelper::clean($item->name));

                    return $name;
                })
                ->editColumn('city', function (Agent $item) {
                    return optional($item->cityRelation)->city_name ?: '';
                })
                ->editColumn('agent_image', function (Agent $item) {
                    if(!empty($item->agent_image))
                        return '<img src="'.asset(Agent::AGENT_IMAGES_PATH . $item->agent_image).'" style="height:50px; object-fit:contain;">';
                    else
                        return '<img src="'.asset(Agent::AGENT_IMAGES_PATH."dp.png").'" style="height:50px;">';
                })
                ->editColumn('agent_status', function (Agent $item) {
                    $actionUrl = route('admin.zameenlocator.agents.update-status', $item->id);
                    $statusButton = (isset($item->agent_status) && $item->agent_status == 0) 
                        ? '<button type="submit" name="approve" class="btn btn-primary">Approve</button>' 
                        : '<button type="submit" name="disapprove" class="btn btn-success">Disapprove</button>';

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
        return $this->addCreateButton(route('admin.zameenlocator.agents.create'), 'admin.zameenlocator.agents.create');
    }
}
