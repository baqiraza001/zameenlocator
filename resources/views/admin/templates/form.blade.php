<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="name">Name</label>
      <input  type="text" id="name" name="name" class="form-control" placeholder="Enter Name..." 
      value="{{ old('name') ??  $template->name }}" required >
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="high">Highlight text</label>
      <input  type="text" id="high" name="high" class="form-control" placeholder="Enter Highlight Text..." 
      value="{{ old('high') ??  $template->high }}" required >
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="text">Text</label>
      <input  type="text" id="text" name="text" class="form-control" placeholder="Enter Text..." 
      value="{{ old('text') ??  $template->text }}" required >
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label>Attach file <small>Max Size 100-MB</small></label>
      <input type="file" name="img" class="form-control" id="file" accept="image/png, image/gif, image/jpeg" {{ isset($template) ? '' : 'required' }}>
    </div>
  </div>

  <div class="col-md-6 mb-1">
    <div class="form-group">
      <label></label>
      @if(!empty($template->img))
      <img src="{{ asset($template::TEMPLATE_IMAGES_PATH . $template->img) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
      @else
      <img src="{{ asset($template::TEMPLATE_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
      @endif
    </div>
  </div>

</div>