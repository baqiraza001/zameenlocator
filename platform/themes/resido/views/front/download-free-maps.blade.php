<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

<!-- ============================ Page Title Start================================== -->
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="ipt-title">Housing Society Maps</h2>
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
      <h1 class="text-center" style="color:#2eca6a;font-size: 2.5rem;"><b>Download Housing Society Maps for Free – Quick and Simple</b></h1>
      <p class="text-center">Download free housing society maps from Zameen Locator, your go-to resource for detailed maps across Pakistan. Perfect for home buyers, real estate agents, and developers, our maps make it easier to find the ideal location. Download them instantly to enhance your property searches and development projects.</p>

      <section class="property-grid grid pb-5">
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
                <a href="{{ URL('map_detail/'.$slug.'/'.$record->id) }}" title="{{ $record->name }}">
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
                    <a href="{{ URL('map_detail/'.$slug.'/'.$record->id) }}" class="prt-view">View More</a>
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



<center> 
  <main id="main" style="margin-top:20px;">
    <!-- ======= Intro Single ======= -->
    
    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid pt-0">
      <div class="container most" >
        <h2>Most Viewed Maps</h2>
        <div class="row">

          <div class="col-md-4 pad">
            <h6></h6><br>

            <span class="bi bi-chevron-right"></span>&nbsp;  <a href="{{ URL('/map/8/Bahria-Enclave-Map') }}" class="lin" > Bahria Enclave Map</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/9/Nova-City-Map---Islamabad-') }}" class="lin"> Nova City Map - Islamabad</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/14/Mumtaz-City-Map---Islamabad-') }}"  class="lin"> Mumtaz City Map - Islamabad</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/15/Lahore-Motorway-City-Map') }}"  class="lin"> Lahore Motorway City Map</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/335/B-17-Multi-Garden-Map-A--B-Block') }}"  class="lin"> B 17 Multi Garden Map A & B Block</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/388/Faisal-Town-Map---Islamabad') }}"  class="lin">Faisal Town Map - Islamabad</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/389/Park-View-City-Islamabad-Map') }}"  class="lin">Park View City Islamabad Map</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/395/Top-City-1-Map---Islamabad') }}"  class="lin">Top City 1 Map - Islamabad</a><br><br>
          </div>


          <div class="col-md-4 pad">
            <h6></h6><br>

            <span class="bi bi-chevron-right"></span>&nbsp;  <a href="{{ URL('/map/7/Lake-City-Lahore-Map') }}" class="lin"> Lake City Lahore Map</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/436/Lahore-Smart-City-Districts-Maps') }}" class="lin" >Lahore Smart City Districts Maps</a><br><br>
            <span class="bi bi-chevron-right"></span><a href="{{ URL('/map/441/DHA-Lahore-PHASE--8--Latest-Air-Avenue-Map') }}"  class="lin">DHA Lahore PHASE 8 Air Avenue Map</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/444/HBFC-Housing-Society-Map') }}"  class="lin"> HBFC Housing Society Map</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/445/LDA-City-PHASE--1-Map') }}"  class="lin"> LDA City PHASE -1 Map</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/457/DHA-Lahore-PHASE-3-and-4-Maps') }}"  class="lin">DHA Lahore PHASE 3 and 4 Maps</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/458/DHA-PHASE-5-Map---Lahore-') }}"  class="lin">DHA PHASE 5 Map - Lahore</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/459/DHA-PHASE-6-Latest-Map---Lahore') }}"  class="lin">DHA PHASE 6 Latest Map - Lahore</a><br><br>
          </div>


          <div class="col-md-4 pad">
            <h6></h6><br>

            <span class="bi bi-chevron-right"></span>&nbsp;
            <a href="{{ URL('/map/391/Citi-Housing-Samundri-Road-Map') }}"  class="lin">Citi Housing Samundri Road Map</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/413/Citi-Housing-Faisalabad-Map') }}"  class="lin">Citi Housing Faisalabad Map</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/460/DHA-PHASE-7-Map---Lahore') }}"  class="lin">DHA PHASE 7 Map - Lahore</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/461/DHA-PHASE-8-Map---Lahore') }}"  class="lin">DHA PHASE 8 Map - Lahore</a><br><br>           
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/397/Rudn-Enclave-Islamabad-Map') }}"  class="lin">Rudn Enclave Islamabad Map</a><br><br>
            <span class="bi bi-chevron-right"></span>&nbsp;<a href="{{ URL('/map/404/Taj-Residencia-Map---Islamabad-') }}"  class="lin">Taj Residencia Map - Islamabad</a>         
          </div>


        </div>
      </div>


    </section>
    <!-- End Property Grid Single-->

  </main>
</center>
  
  <div class="container mb-5">
    <div class="row">
      <div class="col-md-12">

        <h3 style="color:#2eca6a;"> <b>About Zameen Locator's Maps</b> </h3>
        <p>Welcome to ZameenLocator.com, Explore Real Estate Approved Maps,
          Housing Societies & Projects in Pakistan the country's top online maps portal for real estate enthusiasts in Pakistan. Our platform offers a special feature dedicated to providing premium quality maps of societies around the country, allowing you to explore and navigate the approved master plans of various housing projects.
          With ZameenLocator's Realestate Maps of Pakistan, you can access detailed and up-to-date maps that showcase the layout and plot distribution of different societies. We take pride in regularly updating the approved maps of various projects throughout Pakistan, ensuring that you have the latest information at your fingertips<span id="dots">...</span><span id="more">
          Our platform includes a convenient categorization feature that allows you to search for maps by city. Whether you're interested in Lahore, Karachi, Islamabad, or Peshawar, you can easily find the relevant maps for societies located in these main cities. Simply navigate to the city of your choice and explore the most viewed maps section, which highlights popular societies in each respective location - We understand the importance of clear and comprehensive information when it comes to real estate. That's why our maps are uploaded with plot numbers visibly clear, making it easier for you to identify specific plots within the societies. Our integrated navigational option provides a seamless user experience, allowing you to zoom in and out, as well as pan in various directions by using the buttons displayed at the bottom of the panel - At ZameenLocator.com, we are committed to providing you with the most accurate and reliable maps for real estate projects in Pakistan. We continuously update our platform, uploading newer versions of the maps as soon as they become available. This ensures that you have access to the most recent developments and plot distributions within the societies - Whether you're a real estate investor, a prospective buyer, or simply interested in exploring the housing landscape of Pakistan, ZameenLocator.com is your go-to destination. Start your journey today by accessing our premium quality maps and discover the potential of various real estate projects across the country.</span><button onclick="toggleReadMore()" id="myBtn" style="background:#2eca6a; color:white; cursor:pointer;border:none;">Read more</button>
        </p>


      </div>
    </div>
  </div>

<script src="{{ asset('assets/js/custom.js') }}"></script>
