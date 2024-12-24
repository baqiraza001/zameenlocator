<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="ipt-title">City Master Plan Maps</h2>
        <span class="ipn-subtitle text-white"></span>
      </div>
    </div>
  </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Agency List Start ================================== -->
<div class="container" style="margin-top:40px;">
  <div class="row">
    <div class="col text-center">
      <div class="sec-heading center">
        {!! Theme::partial('breadcrumb') !!}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center" style="color:#2eca6a;font-size: 2.5rem;"><b>Pakistan Cities Development Master Plans Maps</b></h1>
      <p class="text-center">Explore master plan maps for cities across Pakistan to discover detailed layouts and development insights. This will help you in your research and decision-making process. Start exploring today to uncover the future of urban development in Pakistan's cities.</p>

      <section class="property-grid grid">
        <div class="container">
          <div class="row">

            @if(isset($records) && $records->count() > 0)
            @foreach($records as $record)
            <?php
            $slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($record->name)));
            $originalText = $record->des;
            $words = explode(' ', $originalText);
            $truncatedText = implode(' ', array_slice($words, 0, 50));
            ?>
            <div class="col-lg-4 col-md-6">
              <div class="blog-wrap-grid">
                <a href="{{ URL('front/master_plan_detail/'.$slug.'/'.$record->id) }}" title="{{ $record->name }}">
                  <div class="blog-body">
                    <div class="blog-thumb">
                      <h4 class="text-center">
                        {{ $record->name }}
                      </h4>
                    </div>
                    <div><?php echo $truncatedText . '...'?></div>
                  </div>
                </a>
                <div class="listing-detail-footer justify-content-center">
                  <div class="footer-flex">
                    <a href="{{ URL('front/master_plan_detail/'.$slug.'/'.$record->id) }}" class="prt-view">View More</a>
                  </div>
                </div>

              </div>
            </div>
            @endforeach
            @else
            <div class="container">
              <div class="row">
                <div class="col-md-12 card" style="background-color: #2e3192; border-radius: 0px;">
                  <h2 class="pt-2 pb-2 text-white">No records found.</h2>
                </div>
              </div>
            </div>
            @endif

            <!-- Pagination -->
            <div class="mt-3">
              {{ $records->links() }}
            </div>

          </div>
        </div>
      </section>
    </div>
  </div>
</div>
