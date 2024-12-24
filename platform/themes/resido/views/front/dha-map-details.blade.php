<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
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
      <h1 class="text-center" style="color:#2eca6a;font-size: 2.5rem;"><b>{{ $societyMap->society_map_name }}</b></h1>

      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <?php 
            if(!empty($societyMap->master_plan))
              $image = asset(\App\Models\SocietyMap::SOCIETY_MAPS_PATH . $societyMap->master_plan);
            else
              $image = asset(\App\Models\SocietyMap::SOCIETY_MAPS_PATH."dp.png");?>
            <img src="{{ $image }}" style="width:100%;" alt="Society Image">
          </div>
        </div>
      </div>

      <section class="property-grid grid">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="post-information">
                <ul class="list-group list-group-horizontal text-center my-4">
                  <li class="list-group-item">
                    <strong>City: </strong>
                    <span class="color-text-a"><?=@$city->city_name?></span>
                  </li>
                  <li class="list-group-item">
                    <strong>District: </strong>
                    <span class="color-text-a"><?=@$district->district_name?></span>
                  </li>
                </ul>
              </div>
              <div class="post-content color-text-a">
                <?=$societyMap->description?>
              </div>
            </div>
          </div>

          <div class="row">
           <div class="col-md-12 ">
            <?php 
            if(!empty($societyMap->banner))
              $image = asset(\App\Models\SocietyMap::SOCIETY_MAPS_PATH . $societyMap->banner);
            else
              $image = asset(\App\Models\SocietyMap::SOCIETY_MAPS_PATH."dp.png");?>
            <img style="" src="{{ $image }}" alt="" class="img-fluid" style="width:728px; height: 90px; ">



          </div>
        </div>

        <!-- Map Address Start--->                                   
        <div class="col-sm-12">
          <h3 class="pt-3"><strong>Google Map Location</strong></h3> <hr>
          <div class="contact-map box" style="border-radius: 5px; box-shadow: 2px 2px 2px black;height: 450px;" >
            <div id="map" class="contact-map">
              <iframe src="<?=$societyMap->map_address?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen allow="geolocation *;"></iframe>
            </div>
          </div>
        </div>
        <!-- Map Address End--->  

      </div>
    </section>
  </div>
</div>


</div>

<center> 
  <main id="main" style="">
    <!-- ======= Intro Single ======= -->
    <!-- End Intro Single-->
    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
     <center>  <h3  style="background:#2eca6a; color:white; padding:8px; text-transform; width:50%; "><strong>HD Maps by Cities</strong></h3></center>

     <div class="container" style="border:2px dashed black; padding:30px;">

      <div class="row">
        @if(isset($cities) && $cities->count() > 0)
        @foreach($cities as $record)
        <div class="col-md-3">
          <?php $slug = preg_replace("/[^a-zA-Z0-9-]+/", "", str_replace(' ', '-', $record->city_name));
          $slug=strtolower($slug);?>
          <a href="{{ URL('maps/'.$slug.'/'.$record->id) }}"  style=" padding:12px;">Society Maps in <?=$record->city_name?></a>
        </div>
        @endforeach
        @endif

      </div>
    </div>


  </section>
  <!-- End Property Grid Single-->
</main>
</center>

<!-- ======= Property Grid ======= -->
<div class="container mb-5">
  <section class="property-grid grid py-2">
    <h4 class="pt-4" style="  color:#2eca6a!important; font-size:20px; font-weight:600;5px; text-transform;"><b>Related Maps</b></h4>
    <div class="row">

      @if(isset($relatedMaps) && $relatedMaps->count() > 0)
      @foreach($relatedMaps as $record)

      <div class="col-lg-4 col-md-6">
        <div class="blog-wrap-grid">
          <div class="blog-thumb">
            <?php 
            $slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($record->society_map_name)));
            if(!empty($record->master_plan))
              $image = asset(\App\Models\SocietyMap::SOCIETY_MAPS_PATH . $record->master_plan);
            else
              $image = asset(\App\Models\SocietyMap::SOCIETY_MAPS_PATH."dp.png");?>
            <a href="{{ URL('map/'.$record->id.'/'.$slug) }}">
              <img
              src="{{ $image }}"
              alt="{{ $record->society_map_name }}" class="img-fluid thumb">
            </a>
          </div>

          <div class="blog-info">
          </div>

          <div class="blog-body">
            <h4 class="bl-title">
              <a href="{{ URL('map/'.$record->id.'/'.$slug) }}" title="{{ $record->society_map_name }}">
                {{ $record->society_map_name }}
              </a>
            </h4>
            <a href="{{ URL('map/'.$record->id.'/'.$slug) }}" class="bi bi-chevron-right">{{ __('Cilck Here To View') }}</a>
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
            <a href="{{ URL('Front/maps') }}">
              <img
              src="{{ $image }}"
              alt="All Maps" class="img-fluid thumb">
            </a>
          </div>

          <div class="blog-info">
          </div>

          <div class="blog-body">
            <h4 class="bl-title">
              <a href="{{ URL('Front/maps') }}" title="All Maps">All Maps</a>
            </h4>
            <a href="{{ URL('Front/maps') }}" class="bi bi-chevron-right">{{ __('Cilck Here To View') }}</a>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>