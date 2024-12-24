<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
      <label for="name">Name</label>
      <input  type="text" id="name" name="name" class="form-control" placeholder="Enter Name..." 
      value="{{ old('name') ??  $blog->name }}" required >
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
    <div class="form-group">
        <label for="blog_id">Cateogry Name</label>
        <select name="blog_id" class="form-control"
        id="blog_id" 
        required
        >
        @foreach($blogCategories as $cateogry)
        <option value="{{ $cateogry->id }}" {{ old('blog_id', isset($blog->blog_id) ? $blog->blog_id : '') == $cateogry->id ? 'selected' : '' }}>
          {{ $cateogry->category }}
        </option>
        @endforeach
      </select>
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
        @if(!empty($blog->img))
        <img src="{{ asset($blog::BLOG_IMAGES_PATH . $blog->img) }}" id="outputo" style="height: 80px;" class="img-fluid pt-2">
        @else
        <img src="{{ asset($blog::BLOG_IMAGES_PATH . 'dp.png') }}" style="height: 100px;">
        @endif
      </div>
    </div>

  @php
    $attributes['class'] = Arr::get([], 'class', '') . ' form-control editor-tinymce ays-ignore';
    $attributes['id'] = 'des';
    $attributes['rows'] = 8;
    @endphp
    <div class="col-lg-12 col-xs-12">
      <div class="form-group">
        <label for="des">Description</label>
        {!! Form::textarea('des', BaseHelper::cleanEditorContent(old('des', isset($blog->des) ? $blog->des : '')), $attributes) !!}
      </div>
    </div>

</div>


@php
Assets::addScriptsDirectly(config('core.base.general.editor.tinymce.js'))
->addScriptsDirectly('vendor/core/core/base/js/editor.js');
@endphp