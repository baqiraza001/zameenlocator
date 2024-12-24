<div class="row">
  <div class="col-md-6 mb-2">
    <div class="form-group">
      <label>Attach Image <small>Max Size 2-MB</small></label>
      <input type="file" name="img" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" required>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($homeImage->img))
      <img src="{{ asset(\App\Http\Controllers\HomeImagesController::HOME_IMAGES_PATH . $homeImage->img) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset(\App\Http\Controllers\HomeImagesController::HOME_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

</div>