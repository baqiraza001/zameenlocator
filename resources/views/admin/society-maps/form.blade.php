<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="societyMapName">Society Map Name</label>
      <input 
      type="text" 
      id="societyMapName" 
      name="society_map_name" 
      class="form-control" 
      placeholder="Enter Map Name..." 
      value="{{ old('society_map_name') ??  $societyMap->society_map_name }}" 
      required
      >
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="citySelect">City Name</label>
      <select name="city_id" class="form-control"
      id="citySelect" 
      required
      >
      @foreach($cities as $city)
      <option value="{{ $city->id }}" {{ old('city_id', isset($societyMap->city_id) ? $societyMap->city_id : '') == $city->id ? 'selected' : '' }}>
        {{ $city->city_name }}
      </option>
      @endforeach
    </select>
  </div>
</div>
<div class="col-lg-6 col-xs-12">
  <div class="form-group">
    <label for="exampleFormControlSelect1">District Name</label>
    <select class="form-control" id="exampleFormControlSelect1" name="district" required>
      <option value="">Please Select District</option>
      @foreach($districts as $district)
      <option value="{{ $district->id }}" {{ old('district', isset($societyMap->district) ? $societyMap->district : '') == $district->id ? 'selected' : '' }}>
        {{ $district->district_name }}
      </option>
      @endforeach
    </select>
  </div>
</div>

<div class="col-md-6"></div>

<script>
  var loadFileo = function(event) {
    var imageo = document.getElementById('outputo');
    imageo.src = URL.createObjectURL(event.target.files[0]);
  };

  var loadFile = function(event) {
    var imageo = document.getElementById('output');
    imageo.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

<div class="col-md-6 mb-1">
  <div class="form-group">
    <label>Attach Master Plan</label>
    <input type="file" name="master_plan" class="form-control" id="file" onchange="loadFileo(event)" accept="image/png, image/gif, image/jpeg" {{ isset($societyMap) ? '' : 'required' }}>
  </div>
</div>

<div class="col-md-6 mb-1">
  <div class="form-group">
    <label></label>
    @if(!empty($societyMap->master_plan))
    <img src="{{ asset($societyMap::SOCIETY_MAPS_PATH . $societyMap->master_plan) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
    @else
    <img src="{{ asset($societyMap::SOCIETY_MAPS_PATH . 'dp.png') }}" style="height: 100px;">
    @endif
  </div>
</div>

<div class="col-md-6 mb-1">
  <div class="form-group">
    <label>Add Banner</label>
    <input type="file" name="banner" class="form-control" id="file" multiple onchange="loadFile(event)" accept="image/png, image/gif, image/jpeg" {{ isset($societyMap) ? '' : 'required' }}>
  </div>
</div>

<div class="col-md-6 mb-1">
  <div class="form-group">
    <label></label>
    @if(!empty($societyMap->banner))
    <img src="{{ asset($societyMap::SOCIETY_MAPS_PATH . $societyMap->banner) }}" id="output" style="height: 80px;" class="img-fluid pt-2">
    @else
    <img src="{{ asset($societyMap::SOCIETY_MAPS_PATH . 'dp.png') }}" style="height: 100px;">
    @endif
  </div>
</div>

<div class="col-md-12">
  <div class="form-group">
    <label>Google Map Address</label>
    <div class="form-group">
      <input type="text" name="map_address" class="form-control" placeholder="Enter Google Map address..." value="{{ old('map_address', isset($societyMap->map_address) ? $societyMap->map_address : '') }}" required>
    </div>
  </div>
</div>

<hr>

@php
Assets::addScriptsDirectly(config('core.base.general.editor.tinymce.js'))
->addScriptsDirectly('vendor/core/core/base/js/editor.js');

$attributes['class'] = Arr::get([], 'class', '') . ' form-control editor-tinymce ays-ignore';
$attributes['id'] = 'description'; // Set the ID specific to the Map Details field
$attributes['rows'] = 8; // Define the number of rows
@endphp

<div class="col-md-12">
  <div class="form-group">
    <label>Map Details</label>
    {!! Form::textarea('description', BaseHelper::cleanEditorContent(old('description', isset($societyMap->description) ? $societyMap->description : '')), $attributes) !!}
  </div>
</div>

</div>