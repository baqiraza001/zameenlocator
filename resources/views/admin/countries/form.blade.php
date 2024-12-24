<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="name">Country Name</label>
      <input  type="text" id="name" name="name" class="form-control" placeholder="Enter Country Name..." 
      value="{{ old('name') ??  $country->name }}" required >
    </div>
  </div>
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="code">Country Code</label>
      <input  type="text" id="code" name="code" class="form-control" placeholder="Enter Country Code..." 
      value="{{ old('code') ??  $country->code }}" required >
    </div>
  </div>
  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach file <small>Max Size 2-MB</small></label>
      <input type="file" name="image" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" {{ isset($country) ? '' : 'required' }}>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($country->image))
      <img src="{{ asset($country::COUNTRY_IMAGES_PATH . $country->image) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($country::COUNTRY_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

</div>