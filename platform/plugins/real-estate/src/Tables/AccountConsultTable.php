<?php

namespace Botble\RealEstate\Tables;

use BaseHelper;
use Botble\RealEstate\Models\Account;
use Botble\RealEstate\Models\Consult;
use Html;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use RvMedia;

class AccountConsultTable extends ConsultTable
{
    public $hasActions = true;

    public $hasCheckbox = true;

    public $hasFilter = false;

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                return Html::link(route('public.account.consults.edit', $item->id), BaseHelper::clean($item->name));
            })
            ->editColumn('email', function ($item) {
                return BaseHelper::clean($item->email);
            })
            ->editColumn('phone', function ($item) {
                return BaseHelper::clean($item->phone);
            })
            ->editColumn('property_name', function ($item) {
                return Html::link(route('public.account.properties.edit', $item->property_id), BaseHelper::clean($item->property_name));
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('status', function ($item) {
                return BaseHelper::clean($item->status->toHtml());
            })
            ->addColumn('operations', function ($item) {
                return $this->getOperations('public.account.consults.edit', 'public.account.consults.destroy', $item);
            });

        return $this->toJson($data);
    }

    public function query(): Relation|Builder|QueryBuilder
    {
        $query = Consult::query()
            ->select([
                're_consults.id',
                're_consults.name',
                're_consults.email',
                're_consults.phone',
                're_consults.property_id',
                're_consults.created_at',
                're_consults.status',
                're_properties.name as property_name',
            ])
            ->leftJoin('re_properties', 're_consults.property_id', '=', 're_properties.id')
            ->where([
                're_properties.author_id' =>17,
                're_properties.author_type' => Account::class,
            ]);

        return $this->applyScopes($query);
    }

    public function columns(): array
    {
        return [
            'id' => [
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'title' => trans('core/base::tables.name'),
                'class' => 'text-start',
            ],
            'email' => [
                'title' => trans('plugins/real-estate::consult.email.header'),
                'class' => 'text-start',
            ],
            'phone' => [
                'title' => trans('plugins/real-estate::consult.phone'),
            ],
            'property_name' => [
                'title' => trans('plugins/real-estate::property.name'),
                'class' => 'text-start',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    public function bulkActions(): array
    {
        return [];
    }

    public function getBulkChanges(): array
    {
        return [
            'name' => [
                'title' => trans('core/base::tables.name'),
                'type' => 'text',
                'validate' => 'required|max:120',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type' => 'date',
            ],
        ];
    }

    public function getDefaultButtons(): array
    {
        return ['reload'];
    }
}
