<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="des">Description</label>
      <textarea class="form-control" name="des" rows="5">{{ old('des') ??  $diary->des }}</textarea>
    </div>
  </div>

  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="price">Price</label>
      <input  type="text" id="price" name="price" class="form-control" placeholder="Enter Price..." 
      value="{{ old('price') ??  $diary->price }}" required >
    </div>
  </div>
  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach Front Image <small>Max Size 2-MB</small></label>
      <input type="file" name="image1" class="form-control" id="image1" accept="image/png, image/gif, image/jpeg" {{ isset($diary) ? '' : 'required' }}>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($diary->image1))
      <img src="{{ asset($diary::DIARY_IMAGES_PATH . $diary->image1) }}" id="image1" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($diary::DIARY_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach Back Image <small>Max Size 2-MB</small></label>
      <input type="file" name="image2" class="form-control" id="image2" accept="image/png, image/gif, image/jpeg" {{ isset($diary) ? '' : 'required' }}>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($diary->image2))
      <img src="{{ asset($diary::DIARY_IMAGES_PATH . $diary->image2) }}" id="image2" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($diary::DIARY_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

</div>