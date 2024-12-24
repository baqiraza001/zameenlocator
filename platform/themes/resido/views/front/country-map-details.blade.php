<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<!-- ============================ Page Title Start================================== -->
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
      <h1 class="text-center" style="color:#2eca6a;font-size: 2rem;background:#2eca6a; padding: 40px;color:white;"><b>Exploring <?php echo strtoupper($countryMapDetails->name);?> History, Map, And Population</b></h1>

      <section class="property-grid grid">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-9 col-sm-12" >
              <?php 
              if(!empty($countryMapDetails->flag))
                $flagImage = asset(\App\Models\CountryMap::COUNTRY_MAP_FLAG_IMAGES_PATH . $countryMapDetails->flag);
              else
                $flagImage = asset(\App\Models\CountryMap::COUNTRY_MAP_FLAG_IMAGES_PATH."dp.png");?>
              <?php 
              if(!empty($countryMapDetails->map))
                $mapImage = asset(\App\Models\CountryMap::COUNTRY_MAP_MAP_IMAGES_PATH . $countryMapDetails->map);
              else
                $mapImage = asset(\App\Models\CountryMap::COUNTRY_MAP_MAP_IMAGES_PATH."dp.png");?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="background-image:url(<?=asset('assets/front/img/map_background.jpg')?>);background-size: 100% 100%;background-repeat:repeat-x;box-shadow: inset 0 0 0 2000px rgba(0, 0, 0, 0.1);">
              <div style="float: left;width: 95%;margin-left: 2%;margin-top: 5%;">
                <div class="row">
                 <div class="col-9">
                  <h1 style="float: left;color:yellow;font-weight: 800;font-size: 2rem;">
                    <?php echo strtoupper($countryMapDetails->name);?></h1>
                  </div>
                  <div class="col-3">
                    <img style="height: 70px;float: right;margin-right: 5%;" src="{{ $flagImage }}" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="row">
                 <div class="col-9">
                  <table style="width: 100%;color: green;font-weight: 700;">
                    <tr>
                      <td>Region</td>
                      <td> <?php echo strtoupper($countryMapDetails->region);?></td>
                    </tr>
                    <tr>
                      <td>Capital</td>
                      <td> <?php echo strtoupper($countryMapDetails->capital);?></td>
                    </tr>
                    <tr>
                      <td>Population</td>
                      <td> <?php echo strtoupper($countryMapDetails->population);?></td>
                    </tr>
                  </table>
                  <hr>
                </div>
              </div>
              <div class="row">
               <div class="col-12">
                <h2 style="float: left;color:yellow;font-weight: 500;">History</h2>
              </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
             <div class="col-12">
              <h5 style="float: left;color:green;font-weight: 500;text-align: center;">
                <?=$countryMapDetails->history?></h5>
              </div>
            </div>
          </div>
        </div>

        <div class="container" style="margin-top:50px;">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="pt-3" style="text-align: center;color:#c5c522;font-weight: 800;"><?php echo strtoupper($countryMapDetails->name);?> Map</h3> <hr>
              <img src="{{ $mapImage }}"
              style="width: 100%" onContextMenu="return false;">
            </div>
            <!-- Map Address end--->  

            <h3 style="margin-top: 10px;text-align: center;color:#c5c522;">Map Price : <b><?=@$countryMapDetails->price?></b> </h3>
            <center> <a href="https://wa.me/03496888886" target="_blank"><button class="button-88" role="button" style="margin-top: 10px;text-align: center;">Buy Now</button></a></center>
          </div>
        </div>

      </div>
    </div>
  </section>

</div>
</div>

</div>

<div class="container mb-5">
  <section class="property-grid grid py-2">
    <h4 class="pt-4" style="  color:#2eca6a!important; font-size:20px; font-weight:600;5px; text-transform;"><b>Related Countries Maps</b></h4><hr>
    <div class="row">

      @if(isset($relatedMaps) && $relatedMaps->count() > 0)
      @foreach($relatedMaps as $record)

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
      @endif
      <div class="col-lg-4 col-md-6">
        <div class="blog-wrap-grid">
          <div class="blog-thumb">
            <?php 
            $image = asset('assets/all-map.jpg');?>
            <a href="{{ URL('Front/country_map') }}">
              <img
              src="{{ $image }}"
              alt="All Countries List" class="img-fluid thumb">
            </a>
          </div>

          <div class="blog-info">
          </div>

          <div class="blog-body">
            <h4 class="bl-title">
              <a href="{{ URL('Front/country_map') }}" title="All Countries List">All Countries List</a>
            </h4>
            <a href="{{ URL('Front/country_map') }}" class="bi bi-chevron-right">{{ __('Cilck Here To View') }}</a>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>
