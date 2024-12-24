@extends('admin.layouts.master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="main-form">
        {!! Form::open(['route' => ['admin.zameenlocator.popups.update', $popup->id], 'class' => 'popups_form', 'name'=>'popups_form', 'autocomplete' => 'off', 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
        @include('admin.popups.form')
        <div class="card-footer col-lg-4 col-xs-12">
          <button class="btn btn-primary mr-1 btn-block" type="submit" value="save">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection