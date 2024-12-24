<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="name">Name</label>
      <input  type="text" id="name" name="name" class="form-control" placeholder="Enter Name..." 
      value="{{ old('name') ??  $map->name }}" required >
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach file <small>Max Size 2-MB</small></label>
      <input type="file" name="img" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" {{ isset($mapCategory) ? '' : 'required' }}>
    </div>
  </div>
  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($map->img))
      <img src="{{ asset($map::MAP_IMAGES_PATH . $map->img) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($map::MAP_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
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
      {!! Form::textarea('des', BaseHelper::cleanEditorContent(old('des', isset($map->des) ? $map->des : '')), $attributes) !!}
    </div>
  </div>

</div>