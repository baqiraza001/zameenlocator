<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="mapName">Name</label>
      <input 
      type="text" 
      id="mapName" 
      name="name" 
      class="form-control" 
      placeholder="Enter Name..." 
      value="{{ old('name') ??  $downloadMap->name }}" 
      required
      >
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="des">Description</label>
      <input 
      type="text" 
      id="des" 
      name="des" 
      class="form-control" 
      placeholder="Enter Description..." 
      value="{{ old('des') ??  $downloadMap->des }}" 
      required
      >
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach Image <small>Max Size 2-MB</small></label>
      <input type="file" name="img" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" {{ isset($downloadMap) ? '' : 'required' }}>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($downloadMap->img))
      <img src="{{ asset($downloadMap::DOWNLOAD_MAPS_PATH . $downloadMap->img) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($downloadMap::DOWNLOAD_MAPS_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

</div>