<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="city_name">City Name</label>
      <input  type="text" id="city_name" name="city_name" class="form-control" placeholder="Enter City Name..." 
      value="{{ old('city_name') ??  $city->city_name }}" required >
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
        <label for="country">Country</label>
        <select name="country" class="form-control"
        id="country" 
        required
        >
        @foreach($countries as $country)
        <option value="{{ $country->id }}" {{ old('country', isset($city->country) ? $city->country : '') == $country->id ? 'selected' : '' }}>
          {{ $country->name }}
        </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach file <small>Max Size 2-MB</small></label>
      <input type="file" name="city_image" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" {{ isset($city) ? '' : 'required' }}>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($city->city_image))
      <img src="{{ asset($city::CITY_IMAGES_PATH . $city->city_image) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($city::CITY_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

</div>