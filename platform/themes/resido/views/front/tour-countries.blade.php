<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="ipt-title">All Countries</h2>
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
      <h1 class="text-center" style="color:#2eca6a;font-size: 2.5rem;"><b>Travel Guide Explore Every Corner of the Globe</b></h1>
      <p class="text-center">Explore the world with our expert travel guide, offering insights and tips to uncover hidden gems and visit iconic landmarks.</p>

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
        <div class="container">
          <div class="row">

            @if(isset($records) && $records->count() > 0)
            @foreach($records as $record)

            <div class="col-lg-4 col-md-6">
              <div class="blog-wrap-grid">
                <div class="blog-thumb">
                  <?php 
                  $slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($record->name)));
                  if(!empty($record->image))
                    $image = asset(\App\Models\Country::COUNTRY_IMAGES_PATH . $record->image);
                  else
                    $image = asset(\App\Models\Country::COUNTRY_IMAGES_PATH."dp.png");?>
                  <a href="{{ URL('tour-cities/'.$slug.'/'.$record->id) }}">
                    <img
                    src="{{ $image }}"
                    alt="{{ $record->name }}" class="img-fluid thumb">
                  </a>
                </div>

                <div class="blog-info pb-0">
                 <h4 class="">
                  <a href="{{ URL('tour-cities/'.$slug.'/'.$record->id) }}" title="{{ $record->name }}">
                    {{ $record->name }}
                  </a>
                </h4>
              </div>

              <div class="blog-body">
                Country Code: {{ $record->code }}<br><br>

                <a href="{{ URL('tour-cities/'.$slug.'/'.$record->id) }}" class="bi bi-chevron-right">{{ __('Cilck Here To View') }}</a>
              </div>

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

          <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_linkedin"></a>
            <a class="a2a_button_facebook_messenger"></a>
            <a class="a2a_button_reddit"></a>
            <a class="a2a_button_x"></a>
            <a class="a2a_button_whatsapp"></a>
          </div>
<script async src="https://static.addtoany.com/menu/page.js"></script>

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


   <div class="container">
        <div class="row">
      <div class="col-md-12" style="border:1px solid #ededed; background:white; padding:20px;">
      <h2 style="color:#2eca6a;border:1px solid #ededed; background:#fbfbfb; padding:13px; width:100%;"><center><strong>List of 12 Most Attractive Places to Visit</strong></center></h2>
           
        </div>
    </div>
</div>


<div class="container" style="margin-top:40px; background:white;  box-shadow: 0 12px 50px -11px rgba(0, 0, 0, 0.2); border-radius:10px;">
    <div class="row" style="padding:20px;">
        <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>1. United States</b></h3><br>
            <p>The United States offers a diverse range of tourist attractions, including vibrant cities like New York, San Francisco, and Las Vegas, iconic landmarks such as the Grand Canyon and Statue of Liberty, beautiful national parks like Yosemite and Yellowstone, and cultural experiences in cities like New Orleans and Chicago.</p>

        </div>
        
        
                <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>2. United Kingdom</b></h3><br>
            <p>The United Kingdom attracts tourists with its rich history and cultural heritage. Visitors can explore landmarks like Buckingham Palace and the Tower of London in London, the stunning landscapes of Scotland and Wales, the historic city of Bath, and the prehistoric monument of Stonehenge.</p>

        </div>
        
        
                    <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>3. France</b></h3><br>
            <p> France is renowned for its art, fashion, and cuisine. Paris, the capital city, offers iconic attractions like the Eiffel Tower, Louvre Museum, and Notre-Dame Cathedral. Other highlights include the Palace of Versailles, the French Riviera, the picturesque region of Provence, and the historic Mont Saint-Michel.
</p>

        </div>
        
        
        
                    <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>4. Italy</b></h3><br>
            <p>Italy is a popular destination for its history, art, and delicious cuisine. Visitors can explore the ancient ruins of Rome, the Renaissance art in Florence, the canals of Venice, and the beautiful coastal towns of the Amalfi Coast. The country is also home to iconic landmarks like the Colosseum, the Vatican City, and the leaning tower of Pisa.

</p>

        </div>
        
                  <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>5. Spain</b></h3><br>
            <p>Spain offers a mix of vibrant cities, beautiful beaches, and rich cultural heritage. Highlights include Barcelona's unique architecture, Madrid's world-class museums, the stunning Alhambra in Granada, the vibrant street life of Seville, and the beautiful islands of the Balearics and the Canaries.</p>

        </div>
        
                   <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>6. Australia</b></h3><br>
            <p>Australia is known for its stunning natural beauty and diverse wildlife. Visitors can explore iconic landmarks like the Sydney Opera House, the Great Barrier Reef, the outback of Uluru, the beautiful beaches of the Gold Coast, and the cosmopolitan city of Melbourne.
</p>

        </div>
        
              <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>7. China</b></h3><br>
            <p>China is a country of ancient history, impressive architecture, and vibrant cities. Popular tourist attractions include the Great Wall of China, the Terracotta Army in Xi'an, the modern skyline of Shanghai, the picturesque landscapes of Guilin, and the historic sites of Beijing, including the Forbidden City and Tiananmen Square.</p>

        </div>
        
                 <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>8. Japan</b></h3><br>
            <p>Japan offers a unique blend of traditional culture and modern innovation. Visitors can explore the bustling city of Tokyo, visit ancient temples in Kyoto, experience traditional tea ceremonies, admire the beauty of cherry blossoms, and relax in hot spring resorts.</p>

        </div>
        
                 <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>9. India</b></h3><br>
            <p>India is a land of diverse cultures, historical monuments, and spiritual experiences. Highlights include the Taj Mahal in Agra, the bustling cities of Delhi and Mumbai, the vibrant festivals, the spiritual sites of Varanasi and Rishikesh, and the wildlife of national parks like Ranthambore and Jim Corbett.</p>

        </div>
        
                 <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>10. Brazil</b></h3><br>
            <p>Brazil is famous for its natural beauty, vibrant festivals, and lively culture. Highlights include the stunning Iguazu Falls, the vibrant city of Rio de Janeiro with its iconic Christ the Redeemer statue, the Amazon Rainforest, and the beautiful beaches of Copacabana and Ipanema.</p>

        </div>
        
        
                <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>11. South Africa</b></h3><br>
            <p>South Africa offers a mix of wildlife safaris, stunning landscapes, and cultural experiences. Visitors can go on thrilling safaris in Kruger National Park, explore the cosmopolitan city of Cape Town, visit the beautiful coastal region of the Garden Route, and experience the rich history and culture of Johannesburg.</p>

        </div>
        
        
                 <div class="col-md-6 text-center" >
            <h3 style="color:#2eca6a;"><b>12. Egypt</b></h3><br>
            <p>Egypt is renowned for its ancient wonders and archaeological sites. Tourists can explore the pyramids of Giza, the temples of Luxor and Karnak, cruise the Nile River, visit the Valley of the Kings, and experience the vibrant culture and markets of Cairo. These are just a few examples of countries and their tourism offerings. Each country has its own unique attractions, culture, and experiences to offer, making the world a diverse and exciting destination for travelers.</p>


        </div>
        
            
        </div>
    </div>
</div>
        
           <div class="container my-4">
        <div class="row">
      <div class="col-md-12" style="border:1px solid #ededed; background:white; padding:20px;">
      <h4 style="color:#2eca6a;border:1px solid #ededed; background:#fbfbfb; padding:13px; width:100%;"><b>(FAQs)</b></h4>
              </p>
              
               <b>1. What documents do I need to travel internationally?</b>
               <p>Typically, you'll need a valid passport, a visa for the destination country (if required), and any necessary travel insurance. Some countries might also require additional documentation such as proof of vaccination, entry permits, or a return ticket.</p>
               </p>

               <b>2. How far in advance should I book my flights and accommodations?</b>
               <p>It's generally recommended to book flights and accommodations at least 2 to 3 months in advance for international trips and 1 to 2 months for domestic trips. This can help you secure better prices and a wider range of options, especially during peak travel seasons.</p>
               </p>

               <b>3. What should I pack in my carry-on bag for a long flight?</b>
               <p>For a long flight, pack essentials such as your passport, travel documents, medications, a change of clothes, toiletries, electronic devices and chargers, headphones, a neck pillow, and some snacks. Also, consider entertainment like books or movies to keep yourself occupied.</p>
               </p>

               <b>4. How can I stay safe while traveling in a foreign country?</b>
               <p>To stay safe while traveling abroad, research the destination's safety guidelines and local customs before you go. Keep your belongings secure, be cautious with your personal information, avoid risky areas, and stay informed about local news and any travel advisories issued by your government.</p>
               </p>

               <b>5. What's the best way to manage money while traveling internationally?</b>
               <p>It's a good idea to use a mix of payment methods. Notify your bank about your travel plans to avoid card blocks, and carry a small amount of local currency for immediate expenses. Use credit/debit cards for larger purchases, and consider a travel money card or preloaded currency card. Avoid exchanging money at airports, as rates tend to be less favorable.</p>
               </p>

               <p>Remember that travel information can change, so always check for the latest recommendations and requirements before your trip.</p>
               </p>
        
    </div>
</div>