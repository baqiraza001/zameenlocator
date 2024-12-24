<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="ipt-title">Real Estate Agents in {{ $city->city_name }}</h2>
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
      <section class="property-grid grid">
        <div class="container">
          <div class="row">

            @if(isset($records) && $records->count() > 0)
            @foreach($records as $record)

            <div class="col-lg-4 col-md-6">
              <div class="blog-wrap-grid">
                <div class="blog-thumb">
                  <?php 
                  $name = $record->first_name." ".$record->last_name;
                  if(!empty($record->image))
                    $image = asset(\App\Models\AGENT::AGENT_IMAGES_PATH . $record->image);
                  else
                    $image = asset(\App\Models\AGENT::AGENT_IMAGES_PATH."dp.png");?>
                  <a href="{{ URL('agents-detail/'.$record->id) }}">
                    <img
                    data-src="{{ $image }}"
                    src="{{ $image }}"
                    alt="{{ $name }}" class="img-fluid thumb">
                  </a>
                </div>

                <div class="blog-body">
                  <h4 class="bl-title">
                    <a href="{{ URL('agents-detail/'.$record->id) }}" title="{{ $name }}">
                      {{ $name }}
                    </a>
                  </h4>
                  <a href="{{ URL('agents-detail/'.$record->id) }}" class="bi bi-chevron-right">{{ __('Cilck To View Agent Details') }}</a>
                </div>

              </div>
            </div>
            @endforeach
            @else
            <div class="container">
              <div class="row">
                <div class="col-md-12 card" style="background-color: #2e3192; border-radius: 0px;">
                  <h2 class="pt-2 pb-2 text-white">No Agents Found</h2>
                </div>
              </div>
            </div>
            @endif

          </div>
        </div>
      </section>
    </div>
  </div>
</div>

