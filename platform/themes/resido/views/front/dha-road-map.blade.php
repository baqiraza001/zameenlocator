<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="ipt-title">All DHA Maps</h2>
        <span class="ipn-subtitle text-white"></span>
      </div>
    </div>
  </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Agency List Start ================================== -->
<section class="blog-page gray-simple py-2">

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
        <h1 class="text-center" style="color:#2eca6a;font-size: 2.5rem;"><b>Maps of All Defence Housing Authority (DHA) Locations in Pakistan</b></h1>
        <p class="text-center"></p>


        <section class="property-grid grid">
          <div class="container">
            <div class="row">

              @if(isset($records) && $records->count() > 0)
              @foreach($records as $record)

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

  <div class="container mb-5">
    <div class="row">
      <div class="col-md-12" style="border:1px solid #ededed; background:white; padding:20px;">
        <h3 style="color:#2eca6a;border:1px solid #ededed; background:#fbfbfb; padding:13px; width:100%;"><b>(FAQs)</b></h3>

        <strong>What is Defence Housing Authority (DHA) in Pakistan?</strong>
        <p>Defence Housing Authority (DHA) is a prominent real estate development organization in Pakistan. It is known for developing and managing high-end residential and commercial projects in major cities, primarily catering to the housing needs of military personnel and civilians alike. DHA projects are often associated with modern amenities and security features.</p>

        <strong>Who can purchase property in DHA Pakistan?</strong>
        <p>In the past, DHA properties were initially reserved for members of the armed forces. However, in recent years, DHA has opened its projects to civilians as well. Now, anyone, regardless of their military affiliation, can purchase property in DHA developments.</p>

        <strong>What are the benefits of living in a DHA community?</strong>
        <p>Living in a DHA community offers several benefits, including well-planned infrastructure, reliable utilities, security measures, and access to amenities like parks, schools, shopping centers, and recreational facilities. DHA neighborhoods are often considered upscale and offer a high standard of living.</p>

        <strong>How does DHA ensure security within its communities?</strong>
        <p>DHA places a strong emphasis on security and typically employs private security personnel, surveillance systems, and gated entry points to ensure the safety of its residents. Many DHA communities also have their own security protocols in place to maintain a secure environment.</p>

        <strong>How can one verify the authenticity of a property in DHA Pakistan?</strong>
        <p>To verify the authenticity of a property in DHA Pakistan, individuals can visit the official DHA website or contact the DHA office in the respective city where the property is located. DHA provides online tools and resources for property verification and offers assistance to potential buyers to ensure they are dealing with genuine properties and authorized sellers.</p>

        <p>Please note that specific rules, regulations, and services offered by DHA may vary from one city to another in Pakistan. It's essential to consult the local DHA office or their official website for city-specific information and updates regarding property matters.</p>


      </div>
    </div>
  </div>

</section>

