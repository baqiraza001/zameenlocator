<div class="row">
  <div class="col-md-12 mb-2">
    <div class="form-group">
      <label>Upload Banner (Add your header image  by 728*90)</label>
      <input type="file" name="banner" class="form-control" id="file" onchange="loadFileo(event)" accept="image/png, image/gif, image/jpeg" {{ isset($societyMap) ? '' : 'required' }}>
    </div>
  </div>
  <div class="col-md-12 mb-3 mt-3">
    <div class="form-group">
      <label>Upload Splash Banner (Add your splash banner by 640*480)</label>
      <input type="file" name="splash_banner" class="form-control" id="file" onchange="loadFileo(event)" accept="image/png, image/gif, image/jpeg" {{ isset($societyMap) ? '' : 'required' }}>
    </div>
  </div>
</div>