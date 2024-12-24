<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="mapName">Name</label>
      <input 
      type="text" 
      id="mapName" 
      name="name" 
      class="form-control" 
      placeholder="Enter Name..." 
      value="{{ old('name') ??  $cityMasterPlan->name }}" 
      required
      >
    </div>
  </div>
  @php
  $attributes['class'] = Arr::get([], 'class', '') . ' form-control editor-tinymce ays-ignore';
  $attributes['id'] = 'des';
  $attributes['rows'] = 8;
  @endphp
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="des">Description</label>
      {!! Form::textarea('des', BaseHelper::cleanEditorContent(old('des', isset($cityMasterPlan->des) ? $cityMasterPlan->des : '')), $attributes) !!}
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach Image <small>Max Size 2-MB</small></label>
      <input type="file" name="img" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" {{ isset($cityMasterPlan) ? '' : 'required' }}>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($cityMasterPlan->img))
      <img src="{{ asset($cityMasterPlan::CITY_MASTER_PLAN_IMAGES_PATH . $cityMasterPlan->img) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($cityMasterPlan::CITY_MASTER_PLAN_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

</div>

@php
Assets::addScriptsDirectly(config('core.base.general.editor.tinymce.js'))
->addScriptsDirectly('vendor/core/core/base/js/editor.js');
@endphp