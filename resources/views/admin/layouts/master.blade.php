@extends('core/base::layouts.base')

@section ('page')
    <div style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="select-chevron" class="icon-symbol--loaded"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path></svg></symbol>
        </svg>
    </div>

    <div class="page-wrapper">

        @include('core/base::layouts.partials.top-header')
        <div class="clearfix"></div>
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <div class="sidebar">
                        <div class="sidebar-content">
                            <ul class="page-sidebar-menu page-header-fixed {{ session()->get('sidebar-menu-toggle') ? 'page-sidebar-menu-closed' : '' }}" data-keep-expanded="false" data-auto-scroll="false" data-slide-speed="200">
                                @include('admin.layouts.partials.sidebar')
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content-wrapper">
                <div class="page-content @if (Route::currentRouteName() == 'media.index') rv-media-integrate-wrapper @endif" style="min-height: 100vh">
                    {!! Breadcrumbs::render('main', PageTitle::getTitle(false)) !!}
                    <div class="clearfix"></div>
                    <div id="main">
                        {!! apply_filters('core_layout_before_content', null) !!}
                        @yield('content')
                        {!! apply_filters('core_layout_after_content', null) !!}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        @include('core/base::layouts.partials.footer')
    </div>

@include('core/table::partials.modal-item', [
    'type' => 'danger',
    'name' => 'modal-confirm-delete',
    'title' => trans('core/base::tables.confirm_delete'),
    'content' => trans('core/base::tables.confirm_delete_msg'),
    'action_name' => trans('core/base::tables.delete'),
    'action_button_attributes' => [
        'class' => 'delete-crud-entry',
    ],
])

@include('core/table::partials.modal-item', [
    'type' => 'danger',
    'name' => 'delete-many-modal',
    'title' => trans('core/base::tables.confirm_delete'),
    'content' => trans('core/base::tables.confirm_delete_many_msg'),
    'action_name' => trans('core/base::tables.delete'),
    'action_button_attributes' => [
        'class' => 'delete-many-entry-button',
    ],
])

@include('core/table::partials.modal-item', [
    'type' => 'info',
    'name' => 'modal-bulk-change-items',
    'title' => trans('core/base::tables.bulk_changes'),
    'content' => '<div class="modal-bulk-change-content"></div>',
    'action_name' => trans('core/base::tables.submit'),
    'action_button_attributes' => [
        'class' => 'confirm-bulk-change-button',
        'data-load-url' => route('tables.bulk-change.data'),
    ],
])

@include('core/table::partials.modal-item', [
    'type' => 'danger',
    'name' => 'bulk-action-confirm-modal',
    'title' => '',
    'content' => '',
    'action_name' => '',
    'action_button_attributes' => [
        'class' => 'confirm-trigger-bulk-actions-button',
    ],
])

@include('core/table::partials.modal-item', [
    'type' => 'danger',
    'name' => 'single-action-confirm-modal',
    'title' => '',
    'content' => '',
    'action_name' => '',
    'action_button_attributes' => [
        'class' => 'confirm-trigger-single-action-button',
    ],
])

@stop

@section('javascript')
    @include('core/media::partials.media')
@endsection

@push('footer')
    @routes
@endpush
