<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="h1">Heading</label>
      <input 
      type="text" 
      id="h1" 
      name="h1" 
      class="form-control" 
      placeholder="Enter Top Heading..." 
      value="{{ old('h1') ??  $popup->h1 }}" 
      required
      >
    </div>
  </div>
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="des">Description</label>
      <textarea class="form-control" name="des" rows="5">{{ old('des') ??  $popup->des }}</textarea>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach Image <small>Max Size 2-MB</small></label>
      <input type="file" name="image" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" {{ isset($popup) ? '' : 'required' }}>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($popup->image))
      <img src="{{ asset($popup::POPUP_IMAGES_PATH . $popup->image) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($popup::POPUP_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

</div>