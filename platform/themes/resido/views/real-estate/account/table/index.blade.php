@php $user = auth('account')->user(); @endphp
@extends(Theme::getThemeNamespace() . '::views.real-estate.account.master')

@if(!empty($propertyTable))
@section('content')
    {!! $propertyTable->render(Theme::getThemeNamespace() . '::views.real-estate.account.table.base'); !!}
@endsection
@endif

@if(!empty($consultTable))
@section('content')
    {!! $consultTable->render(Theme::getThemeNamespace() . '::views.real-estate.account.table.base'); !!}
@endsection
@endif
