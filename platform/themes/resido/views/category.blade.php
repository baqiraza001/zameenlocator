<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="ipt-title">{{ $category->category }}</h1>
                <span class="ipn-subtitle">{{ $category->description }}</span>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<section class="gray-simple">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="sec-heading center">
                    {!! Theme::partial('breadcrumb') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    @foreach($posts as $post)
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
                                src="{{ $image }}"
                                alt="{{ $post->name }}" class="img-fluid thumb lazy">
                            </a>
                        </div>

                        <div class="blog-info">
                        </div>

                        <div class="blog-body">
                            <h4 class="bl-title">
                                <a href="{{ URL('blog-detail/'.$slug.'/'.$post->id) }}" title="{{ $post->name }}">
                                    {{ $post->name }}
                                </a>
                            </h4>
                            <a href="{{ URL('blog-detail/'.$slug.'/'.$post->id) }}" class="bl-continue">Continue</a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-3">
            <div class="blog-wrap-grid"></div>
            {!! dynamic_sidebar('primary_sidebar') !!}
        </div>
    </div>
    <br>

    <div class="colm10 col-sm-12">
        <nav class="d-flex justify-content-center pt-3">
            {!! $posts->withQueryString()->links() !!}
        </nav>
    </div>
</div>
</section>

