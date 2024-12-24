<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="society_name">Society Name</label>
      <input 
      type="text" 
      id="society_name" 
      name="society_name" 
      class="form-control" 
      placeholder="Enter Society Name..." 
      value="{{ old('society_name') ??  $society->society_name }}" 
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
      <option value="{{ $city->id }}" {{ old('city_id', isset($society->city_id) ? $society->city_id : '') == $city->id ? 'selected' : '' }}>
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
      <option value="{{ $district->id }}" {{ old('district', isset($society->district) ? $society->district : '') == $district->id ? 'selected' : '' }}>
        {{ $district->district_name }}
      </option>
      @endforeach
    </select>
  </div>
</div>

<div class="col-md-6 mb-1">
  <label class="mb-3">Check If legal / Un check if illegal</label>
  <div class="form-check">                           
    <input class="form-check-input" name="status" type="checkbox" value="1" {{ old('status', isset($society->status) ? $society->status : '') == 1 ? 'checked' : '' }} id="defaultCheck1">
    <label class="form-check-label" for="defaultCheck1">
      Legal / Illegal
    </label>
  </div>
</div>


@php
Assets::addScriptsDirectly(config('core.base.general.editor.tinymce.js'))
->addScriptsDirectly('vendor/core/core/base/js/editor.js');

$attributes['class'] = Arr::get([], 'class', '') . ' form-control editor-tinymce ays-ignore';
$attributes['id'] = 'society_description'; // Set the ID specific to the Map Details field
$attributes['rows'] = 8; // Define the number of rows
@endphp

<div class="col-md-12">
  <div class="form-group">
    <label>Society Details</label>
    {!! Form::textarea('society_description', BaseHelper::cleanEditorContent(old('society_description', isset($society->society_description) ? $society->society_description : '')), $attributes) !!}
  </div>
</div>

</div>