<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="name">Name</label>
      <input  type="text" id="name" name="name" class="form-control" placeholder="Enter Name..." 
      value="{{ old('name') ??  $agent->name }}" required >
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="email">Email</label>
      <input  type="text" id="email" name="email" class="form-control" placeholder="Enter Email..." 
      value="{{ old('email') ??  $agent->email }}" required >
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="contact">Contact</label>
      <input  type="text" id="contact" name="contact" class="form-control" placeholder="Enter Contact..." 
      value="{{ old('contact') ??  $agent->contact }}" required >
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="citySelect">City</label>
      <select name="city" class="form-control"
      id="citySelect" 
      required
      >
      @foreach($cities as $city)
      <option value="{{ $city->id }}" {{ old('city', isset($agent->city) ? $agent->city : '') == $city->id ? 'selected' : '' }}>
        {{ $city->city_name }}
      </option>
      @endforeach
    </select>
  </div>
</div>

<div class="col-lg-6 col-xs-12">
  <div class="form-group">
    <label for="area">Dealing Area</label>
    <input  type="text" id="area" name="area" class="form-control" placeholder="Enter Area..." 
    value="{{ old('area') ??  $agent->area }}" required >
  </div>
</div>

<div class="col-lg-6 col-xs-12">
  <div class="form-group">
    <label for="address">Office Address</label>
    <input  type="text" id="address" name="address" class="form-control" placeholder="Enter Address..." 
    value="{{ old('address') ??  $agent->address }}" required >
  </div>
</div>



<div class="col-md-6 mb-1">
  <div class="form-group">
    <label>Attach Image <small>Max Size 2-MB</small></label>
    <input type="file" name="image" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" {{ isset($agent) ? '' : 'required' }}>
  </div>
</div>

<div class="col-md-6 mb-1">
  <div class="form-group">
    <label></label>
    @if(!empty($agent->image))
    <img src="{{ asset($agent::AGENT_IMAGES_PATH . $agent->image) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
    @else
    <img src="{{ asset($agent::AGENT_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
    @endif
  </div>
</div>
</div>