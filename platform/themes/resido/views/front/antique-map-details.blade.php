<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<!-- ============================ Agency List Start ================================== -->
<div class="container" style="margin-top:40px;">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center" style="color: white; font-size: 2rem;background: #2eca6a; padding: 40px;">
        <?php echo (isset($antiqueMapDetails->name)) ? $antiqueMapDetails->name : ''; ?></h1>
        <br><br>
        <?php 
        if(!empty($antiqueMapDetails->img))
          $antiqueImage = asset(\App\Models\AntiqueMap::ANTIQUE_MAPS_PATH . $antiqueMapDetails->img);
        else
          $antiqueImage = asset(\App\Models\AntiqueMap::ANTIQUE_MAPS_PATH."dp.png");?>
        <div style="margin-bottom: 40px; border: 2px solid black; position: relative; overflow: hidden; background: #28231D;text-align: center;">
          <img src="{{ $antiqueImage }}" id="mapImage" class="img-thumbnail" style="height: auto; position: relative;" onContextMenu="return false;">

          <button onclick="zoomIn()" style="position: absolute; left: 15px; top: 10%; background: #2eca6a; border: none; color: white;"><span class="bi bi-zoom-in"></span></button>
          <button onclick="zoomOut()" style="position: absolute; left: 15px; top: 20%; background: #2eca6a; border: none; color: white;"><span class="bi bi-zoom-out"></span></button>
          <button onclick="var el = document.getElementById('mapImage'); el.webkitRequestFullscreen();" style="background: #2eca6a; border: none; color: white; position: absolute; left: 15px; top: 30%;"> <span class="bi bi-fullscreen"></span></button>

          <button class="arrow-btn" onClick=move_img('up') value='Up' style="position: relative; left: 10px; top: 16%; background: #2eca6a; border: none; color: white;"><i class="fas fa-arrow-up"></i></button>
          <button class="arrow-btn" onClick=move_img('down') value='down' style="position: relative; left: 10px; top: 16%; background: #2eca6a; border: none; color: white;"><i class="fas fa-arrow-down"></i></button>
          <button class="arrow-btn" onClick=move_img('left') value='Left' style="position: relative; left: 10px; top: 16%; background: #2eca6a; border: none; color: white;"><i class="fas fa-arrow-left"></i></button>
          <button class="arrow-btn" onClick=move_img('right') value='right' style="position: relative; left: 10px; top: 16%; background: #2eca6a; border: none; color: white;"><i class="fas fa-arrow-right"></i></button>
        </div>

        <div><?php echo (isset($antiqueMapDetails->des)) ? $antiqueMapDetails->des : ''; ?></div>
        <br>
      </div>
    </div>
  </div>

  <div class="container mb-5">
    <div class="row">

      @if(isset($relatedMaps) && $relatedMaps->count() > 0)
      @foreach($relatedMaps as $record)
      <?php
      $slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($record->name)));
      $originalText = $record->des;
      $words = explode(' ', $originalText);
      $truncatedText = implode(' ', array_slice($words, 0, 50));
      ?>
      <div class="col-lg-4 col-md-6">
        <div class="blog-wrap-grid">
          <a href="{{ URL('front/antique_detail/'.$slug.'/'.$record->id) }}" title="{{ $record->name }}">
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
              <a href="{{ URL('front/antique_detail/'.$slug.'/'.$record->id) }}" class="prt-view">View More</a>
            </div>
          </div>

        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
  <script src="{{ asset('assets/js/antique_map_details.js') }}"></script>
