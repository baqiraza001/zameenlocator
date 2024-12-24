<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<section>
  <div class="container list">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-10 text-center">
        <div class="sec-heading center">
          <h2>{!! clean($title) !!}</h2>
          <p>{!! clean($description) !!}</p>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        @foreach($categories as $category)
        <div class="col-lg-4 col-md-6">
          <div class="blog-wrap-grid">
            <div class="blog-thumb">
              <?php 
              $slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($category->category)));
              if(!empty($category->img))
                $image = asset(\App\Models\BlogCategory::BLOG_CATEGORIES_IMAGES_PATH . $category->img);
              else
                $image = asset(\App\Models\BlogCategory::BLOG_CATEGORIES_IMAGES_PATH."dp.png");?>
                <a href="{{ URL('blogs/'.$slug) }}">
                <img
                data-src="{{ $image }}"
                src="{{ get_image_loading() }}"
                alt="{{ $category->category }}" class="img-fluid thumb lazy">
              </a>
            </div>

            <div class="blog-info">
            </div>

            <div class="blog-body">
              <h4 class="bl-title">
                <a href="{{ URL('blogs/'.$slug) }}" title="{{ $category->category }}">
                  {{ $category->category }}
                </a>
              </h4>
              <a href="{{ URL('blogs/'.$slug) }}" class="bl-continue">{{ __('Cilck To View All') }}</a>
            </div>

          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>