<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="name">Name</label>
      <input 
      type="text" 
      id="name" 
      name="name" 
      class="form-control" 
      placeholder="Enter Name..." 
      value="{{ old('name') ??  $testimonialSlider->name }}" 
      required
      >
    </div>
  </div>
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="des">Description</label>
      <textarea class="form-control" name="des" rows="5">{{ old('des') ??  $testimonialSlider->des }}</textarea>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach Image <small>Max Size 2-MB</small></label>
      <input type="file" name="image" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" {{ isset($testimonialSlider) ? '' : 'required' }}>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($testimonialSlider->image))
      <img src="{{ asset($testimonialSlider::TESTIMONIAL_SLIDER_IMAGES_PATH . $testimonialSlider->image) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($testimonialSlider::TESTIMONIAL_SLIDER_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

</div>