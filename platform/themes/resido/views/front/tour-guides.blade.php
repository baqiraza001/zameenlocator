<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<!-- ============================ Page Title Start================================== -->

<div class="container-luid">
  <div style="height:480px;background-image:url('{{ asset('cities/' . $city->city_image) }}');background-size: 100% 100%;background-repeat:repeat-x;margin-bottom:24px;box-shadow: inset 0 0 0 2000px rgba(0, 0, 0, 0.2);">
    <br><br><br><br>
    <div class="container_container__Oik-h decor-banner_content__1Vina text-center" style="--decor-banner-padding-end:54px;--decor-banner-margin-end:0;--content-h-placement:initial;--content-v-placement:center;--banner-height:258px;">
      <h3 class="heading_h1__KZ8SV" style="--decor-banner-heading-width:15ch;color: white;">
        Explore Tour Guide in {{ $city->city_name }}
      </h3>
      <p style="--banner-paragraph-pos:initial;--decor-banner-para-width:initial;color:white;font-weight: 450;">
        Zameen Locator provides you Tour Guide...
      </p>
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
      <h1 class="text-center" style="color:#2eca6a;font-size: 2.5rem;"><b>A Traveller’s Guide to {{ $city->city_name }}</b></h1>

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
        @if(isset($records) && $records->count() > 0)
        @foreach($records as $record)
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-9 col-sm-12" >
              <?php 
              if(!empty($record->image))
                $image = asset(\App\Models\TourGuide::TOUR_GUIDE_IMAGES_PATH . $record->image);
              else
                $image = asset(\App\Models\TourGuide::TOUR_GUIDE_IMAGES_PATH."dp.png");?>
              <h3>{{ $record->name }}</h3>
              <div class="news-img-box">
                <img style="border-radius: 5px; margin-top: 5px;" src="{{ $image }}" alt="tour guide image" class="img-fluid" loading="lazy">
              </div>
              <p style="text-align: justify;text-justify: inter-word;font-size: 16px;padding: 10px;">{{ $record->des }}</p>
            </div>
            <div class="col-md-2 col-sm-4 text-center"></div>
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
      </section>

      @if($image2)
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <img src="{{ URL('/').'/'.$image2->img }}" style="width:100%;" alt="Society Image">
          </div>
        </div>
      </div>
      @endif

    </div>
  </div>

  <hr>

  <section class="property-grid grid py-2">
    <h4 class="pt-4" style="  color:#2eca6a!important; font-size:20px; font-weight:600;5px; text-transform;"><b>Recommended for You</b></h4>
    <div class="row">

      @if(isset($cities) && $cities->count() > 0)
      @foreach($cities as $record)

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
      @endif
    </div>
  </section>

</div>
