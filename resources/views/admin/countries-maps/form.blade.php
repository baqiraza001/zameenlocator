<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="name">Name</label>
      <input  type="text" id="name" name="name" class="form-control" placeholder="Enter Name..." 
      value="{{ old('name') ??  $countryMap->name }}" required />
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="region">Country Region</label>
      <input  type="text" id="region" name="region" class="form-control" placeholder="Enter Region..." 
      value="{{ old('region') ??  $countryMap->region }}" required />
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="population">Country Population</label>
      <input  type="text" id="population" name="population" class="form-control" placeholder="Enter Population..."
      value="{{ old('population') ??  $countryMap->name }}" required />
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="capital">Country Capital</label>
      <input  type="text" id="capital" name="capital" class="form-control" placeholder="Enter Capital..." 
      value="{{ old('capital') ??  $countryMap->capital }}" required />
    </div>
  </div>
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="price">Country Price</label>
      <input  type="number" id="price" name="price" class="form-control" placeholder="Enter Price..." 
      value="{{ old('price') ??  $countryMap->price }}" required />
    </div>
  </div>


    <div class="col-md-6 mb-1">
      <div class="form-group">
        <label>Attach Country Flag Image <small>Max Size 2-MB</small></label>
        <input type="file" name="flag" class="form-control" id="" accept="image/png, image/gif, image/jpeg" {{ isset($countryMap) ? '' : 'required' }}>
      </div>
    </div>
    <div class="col-md-6 mb-1">
      <div class="form-group">
        <label></label>
        @if(!empty($countryMap->flag))
        <img src="{{ asset($countryMap::COUNTRY_MAP_FLAG_IMAGES_PATH . $countryMap->flag) }}" id="" style="height: 80px;" class="img-fluid pt-2">
        @else
        <img src="{{ asset($countryMap::COUNTRY_MAP_FLAG_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
        @endif
      </div>
    </div>

    <div class="col-md-6 mb-1">
      <div class="form-group">
        <label>Attach Country Map Image <small>Max Size 2-MB</small></label>
        <input type="file" name="map" class="form-control" id="" accept="image/png, image/gif, image/jpeg" {{ isset($countryMap) ? '' : 'required' }}>
      </div>
    </div>
    <div class="col-md-6 mb-1">
      <div class="form-group">
        <label></label>
        @if(!empty($countryMap->map))
        <img src="{{ asset($countryMap::COUNTRY_MAP_MAP_IMAGES_PATH . $countryMap->map) }}" id="" style="height: 80px;" class="img-fluid pt-2">
        @else
        <img src="{{ asset($countryMap::COUNTRY_MAP_MAP_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
        @endif
      </div>
    </div>

  @php
    $attributes['class'] = Arr::get([], 'class', '') . ' form-control editor-tinymce ays-ignore';
    $attributes['id'] = 'history';
    $attributes['rows'] = 8;
    @endphp
    <div class="col-lg-12 col-xs-12">
      <div class="form-group">
        <label for="history">Country History</label>
        {!! Form::textarea('history', BaseHelper::cleanEditorContent(old('history', isset($countryMap->history) ? $countryMap->history : '')), $attributes) !!}
      </div>
    </div>

</div>


@php
Assets::addScriptsDirectly(config('core.base.general.editor.tinymce.js'))
->addScriptsDirectly('vendor/core/core/base/js/editor.js');
@endphp