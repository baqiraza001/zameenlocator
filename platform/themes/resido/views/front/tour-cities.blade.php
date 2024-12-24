<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="ipt-title"><?php echo $country1; ?> City Wise Tour Guide</h2>
        <span class="ipn-subtitle text-white"></span>
      </div>
    </div>
  </div>
</div>
<!-- ============================ Page Title End ================================== -->
<style>
  .carousel-item img {
    padding: 5px 0px;
  }
</style>
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
      <h1 class="text-center" style="color:#2eca6a;font-size: 2.5rem;"><b></b></h1>
      <p class="text-center">Explore Pakistan with a Tour Guide. Find the Most Beautiful, Safe and interesting Places to Explore with our Comprehensive Tour guide. Experience the Best of Pakistan with Zameen Locator. Explore Pakistan without Any Worries.Find the Best Places to visit in Pakistan with our Reliable Tour Guide. Find your Favorite Attractions without Hassle, and plan your Travels with Zameen Locator, Take the Stress out of Traveling with our Tour Guide Find the Most Beautiful Places in Pakistan and Plan Your Travels with Ease and Make Your Trip an Unforgettable Experience...</p>

      @if($image1)
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <img src="{{ URL('/').'/'.$image1->img }}" style="width:100%;" alt="Society Image">
                </div>
            </div>
        </div>
        @endif

      <section class="property-grid grid">
        <div class="container">
          <div class="row">

            @if(isset($records) && $records->count() > 0)
            @foreach($records as $record)

            <div class="col-lg-4 col-md-6">
              <div class="blog-wrap-grid">
                <div class="blog-thumb">
                  <?php 
                  $slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($record->city_name)));
                  if(!empty($record->city_image))
                    $image = asset(\App\Models\City::CITY_IMAGES_PATH . $record->city_image);
                  else
                    $image = asset(\App\Models\City::CITY_IMAGES_PATH."dp.png");?>
                  <a href="{{ URL('tour-guide/'.$country.'/'.$slug) }}">
                    <img
                    src="{{ $image }}"
                    alt="{{ $record->city_name }}" class="img-fluid thumb">
                  </a>
                </div>

                <div class="blog-info">
                </div>

                <div class="blog-body">
                  <h4 class="bl-title">
                    <a href="{{ URL('tour-guide/'.$country.'/'.$slug) }}" title="{{ $record->city_name }}">
                      {{ $record->city_name }}
                    </a>
                  </h4>
                  <a href="{{ URL('tour-guide/'.$country.'/'.$slug) }}" class="bi bi-chevron-right">{{ __('Cilck Here To View') }}</a>
                </div>

              </div>
            </div>
            @endforeach
            @else
            <div class="container">
              <div class="row">
                <div class="col-md-12 card" style="background-color: #2e3192; border-radius: 0px;">
                  <h2 class="pt-2 pb-2 text-white">No record found.</h2>
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
