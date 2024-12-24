<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>{!! clean($title) !!}</h2>
                    <p>{!! clean($description) !!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
            <!-- Single blog Grid -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-wrap-grid">
                    <div class="blog-thumb">
                      <?php 
                      $slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($post->name)));
                      if(!empty($post->img))
                        $image = asset(\App\Models\Blog::BLOG_IMAGES_PATH . $post->img);
                    else
                        $image = asset(\App\Models\Blog::BLOG_IMAGES_PATH."dp.png");?>
                    <a href="{{ URL('blog-detail/'.$slug.'/'.$post->id) }}">
                        <img
                        data-src="{{ $image }}"
                        src="{{ get_image_loading() }}"
                        alt="{{ $post->name }}" class="img-fluid thumb lazy">
                    </a>

                </div>
                <div class="blog-info">
                </div>
                <div class="blog-body">
                    <h4 class="bl-title">
                        <a href="{{ URL('blog-detail/'.$slug.'/'.$post->id) }}">{{ $post->name }}</a>
                    </h4>
                    <a href="{{ URL('blog-detail/'.$slug.'/'.$post->id) }}" class="bl-continue">{{ __('Continue') }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</section>
<!-- ================= Blog Grid End ================= -->
