<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h1 class="ipt-title" style="font-size: 2.5rem;"><?=@$societyDetails->society_name?></h1>
        <span class="ipn-subtitle text-white"></span>
      </div>
    </div>
  </div>
</div>

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

        <div class="row">         
          <div class="col-md-12 offset-md-1 col-lg-8 offset-lg-2">
            <div class="col-md-12">
              @if($city)
             <strong class="">City: </strong>
             <span class="color-text-a mr-3">{{ $city->city_name }}</span> 
              @endif
              @if($district)
             <strong class="">District: </strong>
             <span class="color-text-a mx-3">{{ $district->district_name }}</span> 
              @endif
             @php
             if($societyDetails->status == 0){
              $status ='Illegal';
            }else{
              $status ='Legal';
            }
            @endphp
            &nbsp;&nbsp;&nbsp;
            <strong class="">Status: </strong>
            <span class="label label-{{ $societyDetails->status == 0 ? 'danger' : 'success'}} mr-3">{{ $status }}</span>
          </div>
          <hr>
          <div class="post-content color-text-a card p-5 mb-5">
           <?= $societyDetails->society_description ?>
         </div>           
       </div>
     </div>

   </div>
 </div>
</div>


</div>
