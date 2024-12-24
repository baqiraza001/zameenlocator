<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="ipt-title">Countries Maps</h2>
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
@if(isset($ads) && $ads->count() > 0)
<section class="blog-page gray-simple py-2">

  <div id="robotcarousel" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner">
      @foreach($ads as $index => $ad)
      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
        <img 
        class="d-block w-100" 
        src="{{ asset($ad->img) }}" 
        alt="carousel image" 
        style="height: 90px; width: 728px; object-fit: contain;">
      </div>
      @endforeach
    </div>
  </div>
</section>

@endif

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
      <h1 class="text-center" style="color:#2eca6a;font-size: 2.5rem;"><b>Countries Maps Region Population And History</b></h1>
      <p class="text-center">Explore a comprehensive collection of country maps, regional insights, population statistics, and historical details. Discover the geographical layouts, cultural backgrounds, and key historical events that have shaped nations worldwide.</p>

      <section class="property-grid grid">
        <div class="container">
          <div class="row">

            @if(isset($records) && $records->count() > 0)
            @foreach($records as $record)

            <div class="col-lg-4 col-md-6">
              <div class="blog-wrap-grid">
                <div class="blog-thumb">
                  <?php 
                  $slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($record->name)));
                  if(!empty($record->flag))
                    $image = asset(\App\Models\CountryMap::COUNTRY_MAP_FLAG_IMAGES_PATH . $record->flag);
                  else
                    $image = asset(\App\Models\CountryMap::COUNTRY_MAP_FLAG_IMAGES_PATH."dp.png");?>
                  <a href="{{ URL('country-map-detail/'.$slug) }}">
                    <img
                    src="{{ $image }}"
                    alt="{{ $record->name }}" class="img-fluid thumb">
                  </a>
                </div>

                <div class="blog-info">
                </div>

                <div class="blog-body">
                  <h4 class="bl-title">
                    <a href="{{ URL('country-map-detail/'.$slug) }}" title="{{ $record->name }}">
                      {{ $record->name }}
                    </a>
                  </h4>
                  <a href="{{ URL('country-map-detail/'.$slug) }}" class="bi bi-chevron-right">{{ __('Cilck Here To View') }}</a>
                </div>

              </div>
            </div>
            @endforeach
            @else
            <div class="container">
              <div class="row">
                <div class="col-md-12 card" style="background-color: #2e3192; border-radius: 0px;">
                  <h2 class="pt-2 pb-2 text-white">Sorry, currently we don't have any maps in the database.</h2>
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
