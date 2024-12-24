<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="name">Place Name</label>
      <input  type="text" id="name" name="name" class="form-control" placeholder="Enter Place Name..." 
      value="{{ old('name') ??  $tourGuide->name }}" required >
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="country">Country</label>
      <select name="country" class="form-control"
      id="country" 
      required
      onchange="getCity(this)"
      >
      <option value="">Select Country</option>
      @foreach($countries as $country)
      <option value="{{ $country->id }}" {{ old('country', isset($tourGuide->country) ? $tourGuide->country : '') == $country->id ? 'selected' : '' }}>
        {{ $country->name }}
      </option>
      @endforeach
    </select>
  </div>
</div>
<div class="col-lg-6 col-xs-12">
  <div class="form-group">
    <label for="city">City</label>
    <select name="city" class="form-control"
    id="city" 
    required
    >
    @if(!empty($tourGuide->city))
    <option value="{{ $tourGuide->city }}" selected>{{ $tourGuide->cityRelation->city_name }}</option>
    @else
    <option value="">Select Country First</option>
    @endif
  </select>
</div>
</div>

<div class="col-md-6 mb-1">
  <div class="form-group">
    <label>Attach Image <small>Max Size 2-MB</small></label>
    <input type="file" name="image" class="form-control" id="" accept="image/png, image/gif, image/jpeg" {{ isset($tourGuide) ? '' : 'required' }}>
  </div>
</div>
<div class="col-md-6 mb-1">
  <div class="form-group">
    <label></label>
    @if(!empty($tourGuide->image))
    <img src="{{ asset($tourGuide::TOUR_GUIDE_IMAGES_PATH . $tourGuide->image) }}" id="" style="height: 80px;" class="img-fluid pt-2">
    @else
    <img src="{{ asset($tourGuide::TOUR_GUIDE_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
    @endif
  </div>
</div>

@php
Assets::addScriptsDirectly(config('core.base.general.editor.tinymce.js'))
->addScriptsDirectly('vendor/core/core/base/js/editor.js');

$attributes['class'] = Arr::get([], 'class', '') . ' form-control editor-tinymce ays-ignore';
$attributes['id'] = 'des'; // Set the ID specific to the Map Details field
$attributes['rows'] = 8; // Define the number of rows
@endphp

<div class="col-md-12">
  <div class="form-group">
    <label>Description</label>
    {!! Form::textarea('des', BaseHelper::cleanEditorContent(old('des', isset($tourGuide->des) ? $tourGuide->des : '')), $attributes) !!}
  </div>
</div>

</div>

<script type="text/javascript">
  function getCity(this_ref) {
    let country_id = this_ref.value;
    if(country_id)
    {
      $.ajax({
        type: "POST",
        data: { id: country_id, _token: '{{ csrf_token() }}' },
        url: "{{ route('admin.zameenlocator.tour-guides.get-city') }}",
        dataType: 'json',
        success: function(response) {
          $("#city").html(response);
        },
        error: function(e) {
          alert('error');
        }
      });
    }
  }
</script>
