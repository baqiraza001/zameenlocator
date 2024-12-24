<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h5 class="ipt-title">{{ $post->name }}</h5>
                <span class="ipn-subtitle"></span>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Agency List Start ================================== -->
<section class="blog-page gray-simple">

    <div class="container">

        <div class="row">
            <div class="col text-center">
                <div class="sec-heading center">
                    {!! Theme::partial('breadcrumb') !!}
                </div>
            </div>
        </div>

        <!-- row Start -->
        <div class="row">
            <!-- Blog Detail -->
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="blog-details single-post-item format-standard">
                    <div class="post-details">
                        <div class="post-featured-img">
                          <?php 
                          if(!empty($post->img))
                            $image = asset(\App\Models\Blog::BLOG_IMAGES_PATH . $post->img);
                        else
                            $image = asset(\App\Models\Blog::BLOG_IMAGES_PATH."dp.png");?>

                        <img class="img-fluid"
                        src="{{ $image }}"
                        alt="{{ $post->name }}">
                    </div>

                    <h2 class="post-title">{{ $post->name }}</h2>

                    <div>
                        <div class="ck-content">{!! BaseHelper::clean($post->des) !!}</div>
                    </div>

                    <div class="post-bottom-meta">
                        <div class="post-share">
                            {!! Theme::partial('share', ['title' => __('Share this post'), 'description' => $post->des]) !!}
                        </div>
                    </div>

                </div>
            </div>

            <?php
            $relatedPosts = \App\Models\Blog::select('*')
            ->where('blog_id', $category->id)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
            ?>

            @if ($relatedPosts->count())
            <div class="blog-details single-post-item format-standard">
                <h4><strong>{{ __('Recommended For You') }}:</strong></h4>
                <div class="blog-container">
                    <div class="row">
                        @foreach ($relatedPosts as $relatedItem)
                        <div class="col-md-6 col-sm-6 container-grid">
                            <div class="blog-wrap-grid">
                                <div class="blog-thumb">
                                  <?php 
                                  $slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($post->name)));
                                  if(!empty($post->img))
                                    $image = asset(\App\Models\Blog::BLOG_IMAGES_PATH . $post->img);
                                else
                                    $image = asset(\App\Models\Blog::BLOG_IMAGES_PATH."dp.png");?>

                                <a href="{{ URL('blog-detail/'.$slug.'/'.$post->id) }}" class="linkdetail">
                                    <div class="blii">
                                        <div class="img">
                                            <img class="img-fluid thumb lazy"
                                            data-src="{{ $image }}"
                                            src="{{ get_image_loading() }}"
                                            alt="{{ $post->name }}" class="img-fluid thumb lazy">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="blog-body">
                                <div class="blog-title">
                                    <a href="{{ URL('blog-detail/'.$slug.'/'.$post->id) }}">
                                        <h4 class="bl-title">{{ $relatedItem->name }}</h2>
                                        </a>
                                        </div>
                                        <div class="blog-excerpt">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Single blog Grid -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                {!! dynamic_sidebar('primary_sidebar') !!}
            </div>
        </div>
    </div>
</section>
