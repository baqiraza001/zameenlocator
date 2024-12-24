<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

<div style="height:258px;background-image:url(<?=asset('assets/front/landmarks-silhouette.svg')?>);background-position:bottom center;background-repeat:repeat-x;margin-bottom:24px;margin-top: 0px;">
  <br><br><br><br>
  <div class="container_container__Oik-h decor-banner_content__1Vina text-center" style="--decor-banner-padding-end:54px;--decor-banner-margin-end:0;--content-h-placement:initial;--content-v-placement:center;--banner-height:258px;"><h1 class="heading_h1__KZ8SV" style="--decor-banner-heading-width:15ch;color:#2eca6a;"><strong>Explore Property Diary in Pakistan</strong></h1><p style="--banner-paragraph-pos:initial;--decor-banner-para-width:initial;color:grey;font-weight: 450;"><center>Property Diary is your companion for your real estate journey. Capture every detail, from the thrill of your first property visit to the joy of closing a deal. Track your investments, document renovations, and record your experiences as you build your real estate portfolio.</center></p></div>
</div>

<!-- ============================ Agency List Start ================================== -->
<section class="blog-page gray-simple py-2">
  <div class="container" style="margin-top:30px; ">
   <div class="row">
    <div class="col text-center">
      <div class="sec-heading center">
        {!! Theme::partial('breadcrumb') !!}
      </div>
    </div>
  </div>

  <div class="container" style="margin-top:30px;">
   @if(isset($records) && $records->count() > 0)
   @foreach($records as $record)
   <section class="news-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
         <center><strong>Front:</strong></center>
         <div class="news-img-box">
          <img style="border-radius: 5px; box-shadow: 2px 2px 2px black;" src="{{ asset('assets/diary/'.$record->image1) }}" alt="" class="img-fluid">
        </div>
      </div>
      <div class="col-sm-6">
        <center><strong>Back:</strong></center>
        <div class="news-img-box">
          <img style="border-radius: 5px; box-shadow: 2px 2px 2px black;" src="{{ asset('assets/diary/'.$record->image2) }}" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section>

<br><br>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12" >
      <div class="card" style="width: 100%;">
        <div class="card-header">
          <h3 style="color:#2eca6a;"><strong>Description:</strong></h3>
          <p>A property diary is a record-keeping tool used by real estate investors, landlords, or property managers to track various aspects of property management and investment. It can include a variety of information related to the properties owned or managed, such as:</p>

          <p><strong>Property Details:</strong> Basic information about each property, including address, size, type, and features.</p>

          <p><strong>Financial Records:</strong> Details of income and expenses related to the property, such as rent collected, maintenance costs, taxes, insurance, and mortgage payments.</p>

          <p><strong>Tenant Information:</strong> Details about current and past tenants, including contact information, lease terms, rental history, and any issues or communications with tenants.</p>

          <p><strong>Maintenance and Repairs:</strong> Records of any maintenance or repair work done on the property, including dates, costs, and contractors used.</p>

          <p><strong>Legal Documents:</strong> Copies of important documents related to the property, such as leases, purchase agreements, inspection reports, and compliance certificates.</p>

          <p><strong>Market Analysis:</strong> Information about the local real estate market, including property values, rental rates, and trends that might affect the investment.</p>

          <p><strong>Notes and Observations:</strong> Personal notes and observations about the property, such as potential improvements, issues to address, or strategic plans for the property.</p>

          <p>A property diary can be kept in a physical notebook or digitally using spreadsheets, property management software, or specialized apps. It helps property owners and managers stay organized, make informed decisions, and maintain a clear record of their real estate activities</p>
        </div>

      </div>
      <br>

      <ul class="list-group list-group-flush">
        <li class="list-group-item" style="margin-left: 20px;">
          <h4 style="text-align: justify;text-justify: inter-word;"><?=$record->des?></h4>

        </li>
        <li class="list-group-item" style="margin-left: 30px;">
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th scope="row"><h4>Price:</h4></th>
                  <td><h4><?=$record->price?></h4></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2"><a href="https://wa.me/03496888886" target="_blank"><button class="button-88" role="button">Order Now</button></a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
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
</div>

<div class="container na mt-5" style=""></div>



</section>
<script src="{{ asset('assets/js/hajj_umrah.js') }}"></script>
