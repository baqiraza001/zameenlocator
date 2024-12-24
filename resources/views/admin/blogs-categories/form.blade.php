<div class="row">
  <div class="col-lg-12 col-xs-12">
    <div class="form-group">
      <label for="category">Category Name</label>
      <input  type="text" id="category" name="category" class="form-control" placeholder="Enter Category Name..." 
      value="{{ old('category') ??  $blogCategory->category }}" required >
    </div>
  </div>
  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach file <small>Max Size 2-MB</small></label>
      <input type="file" name="img" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" {{ isset($blogCategory) ? '' : 'required' }}>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($blogCategory->img))
      <img src="{{ asset($blogCategory::BLOG_CATEGORIES_IMAGES_PATH . $blogCategory->img) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($blogCategory::BLOG_CATEGORIES_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

</div>