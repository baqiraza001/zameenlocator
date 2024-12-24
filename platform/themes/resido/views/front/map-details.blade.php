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
      <div class="container mt-5">
        <div class="row justify-content-center mb-5">
          <div class="col-md-12 text-center">
            <h1 style="text-align:center;background:#2eca6a; color:white; padding:30px;font-size: 2.5rem;"><?php echo (isset($mapDetails->name))?$mapDetails->name:''; ?></h1>  <br><br>
            <p><?php echo (isset($mapDetails->des))?$mapDetails->des:''; ?></p><br>
            <?php 
            if(!empty($mapDetails->img))
              $image = asset(\App\Models\SocietyMap::SOCIETY_MAPS_PATH . $mapDetails->img);
            else
              $image = asset(\App\Models\SocietyMap::SOCIETY_MAPS_PATH."dp.png");?>
            <a class="" style=" background: #2eca6a!important; color:white!important; padding:10px;" role="button" href="{{ $image }}" download="Zameenlocater Map">
              Download Map Now
            </a><br><br><br>
            <img   src="{{ $image }}" download="GFG"  style="width: auto;height: auto;" class="img-thumbnail">   


          </div>
        </div>
      </div>
    </div>
  </div>


</div>
