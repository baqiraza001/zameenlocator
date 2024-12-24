<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="ipt-title">Real Estate Agents by Cities</h2>
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
                  $slug = (preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($record->city_name)));
                  if(!empty($record->city_image))
                    $image = asset(\App\Models\CITY::CITY_IMAGES_PATH . $record->city_image);
                  else
                    $image = asset(\App\Models\CITY::CITY_IMAGES_PATH."dp.png");?>
                  <a href="{{ URL('agents/'.$slug) }}">
                    <img
                    data-src="{{ $image }}"
                    src="{{ $image }}"
                    alt="{{ $record->city_name }}" class="img-fluid thumb">
                  </a>
                </div>

                <div class="blog-body">
                  <h4 class="bl-title">
                    <a href="{{ URL('agents/'.$slug) }}" title="{{ $record->city_name }}">
                      {{ $record->city_name }}
                    </a>
                  </h4>
                  <a href="{{ URL('agents/'.$slug) }}" class="bi bi-chevron-right">{{ __('Cilck Here To View') }}</a>
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

          </div>
        </div>
      </section>
    </div>
  </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12" style="border:1px solid #ededed; background:white; padding:20px;">
            <h3 style="color:#2eca6a;border:1px solid #ededed; background:#fbfbfb; padding:13px; width:100%;"><strong>(FAQs)</strong></h3>

            <strong>1: What is a real estate agent, and what do they do?</strong>
            <p>A real estate agent is a licensed professional who assists individuals with buying, selling, or renting real estate properties. They act as intermediaries between buyers and sellers, providing expertise in market trends, property valuation, negotiation, and legal processes related to real estate transactions.</p>

            <strong>2: How do real estate agents get paid?</strong>
            <p>Real estate agents typically earn a commission, which is a percentage of the final sale price of a property. The commission is usually split between the buyer's agent and the seller's agent. The exact percentage can vary but is often around 5-6% of the property's sale price. However, commissions are negotiable, and rates may differ by location and market conditions.</p>

            <strong>3: Do I need a real estate agent to buy or sell a home?</strong>
            <p>No, you are not required to use a real estate agent when buying or selling a home, but having one can be beneficial. Agents bring expertise, market knowledge, negotiation skills, and access to listings that can help you make informed decisions and streamline the process. Whether to use an agent depends on your comfort level, experience, and specific needs.</p>

            <strong>4: How do I choose the right real estate agent for my needs?</strong>
            <p>To find the right real estate agent, consider factors such as their experience, local market knowledge, reputation, communication style, and compatibility with your goals. Ask for referrals, read reviews, and interview multiple agents to assess their qualifications and determine who is the best fit for your real estate transaction.</p>

            <strong>5: What are the responsibilities of a seller's agent and a buyer's agent?</strong>
            <p>A seller's agent (listing agent) represents the interests of the property seller. Their responsibilities include marketing the property, setting an appropriate asking price, negotiating with potential buyers, and guiding the seller through the closing process. On the other hand, a buyer's agent represents the interests of the homebuyer, helping them find suitable properties, negotiate offers, and navigate the purchasing process to secure the best possible deal. Both agents aim to protect their respective clients' interests throughout the transaction.</p>
        </div>
    </div>
</div>