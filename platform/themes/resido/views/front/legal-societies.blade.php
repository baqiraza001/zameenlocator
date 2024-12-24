<component is="script" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2078315396486930" crossorigin="anonymous"></component>
<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-2078315396486930" data-ad-slot="8006403986"></ins>
<component is="script">(adsbygoogle = window.adsbygoogle || []).push({});</component>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="ipt-title">Societies</h2>
                <span class="ipn-subtitle text-white">Approved Societies</span>
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
                <h1 class="text-center" style="color:#2eca6a;font-size: 2.5rem;"><b>Zameen Locator: Find Top-Approved Housing Societies Online</b></h1>
                <p class="text-center">
                    Zameen Locator is your go-to source for approved housing societies information from all over.
                    Check the Status of CDA, RDA, and LDA-approved societies.
                </p>

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
                            <div class="col-md-12 m-1">
                                <div class="table-responsive-sm">
                                    <table class="table table-bordered table-striped">
                                        <thead class="bg-success text-white">
                                            <tr>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th>Status</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($societies as $society)
                                            <tr>
                                                <td>{{ $society->society_name }}</td>
                                                <td>{{ $society->city->city_name ?? 'N/A' }}</td>
                                                <td><i class="bi bi-check-circle-fill text-success"></i></td>
                                                <td>
                                                    <a href="{{ url('societies/' . Str::slug($society->society_name) . '/' . $society->id) }}">
                                                        <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Pagination -->
                                    <div class="mt-3">
                                        {{ $societies->links() }}
                                    </div>
                                </div>
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
                <h3 style="color:#2eca6a; border:1px solid #ededed; background:#fbfbfb; padding:13px; width:100%;"><center><b>Why Choose Zameen Locator?</b></center></h3>

                <p>Your ultimate destination for finding the best-approved housing societies online. Whether you're looking to buy your dream home or invest in real estate, our platform offers a comprehensive and reliable resource to help you make informed decisions.</p>

                <h4><b>How It Works</b></h4>
                <p><strong>Verified Listings</strong></p>
                <p>Our platform features only approved housing societies, ensuring that all listings meet the necessary legal and regulatory requirements. You can browse with confidence, knowing that every property is vetted and verified.</p>

                <p><strong>Comprehensive Database</strong></p>
                <p>We provide access to a wide range of housing societies across different locations. Whether you’re looking for a luxurious villa, a budget-friendly apartment, or a family-friendly community, Zameen Locator has it all.</p>

                <p><strong>Detailed Information</strong></p>
                <p>Each listing comes with detailed information, including amenities, infrastructure, pricing, and more. Our goal is to provide you with all the details you need to make the best choice.</p>

                <p><strong>Expert Advice</strong></p>
                <p>We offer expert advice and insights on real estate trends, market analysis, and tips for home buyers and investors. Our blog and resources section is filled with valuable information to guide you through every step of your property journey.</p>

                <h4><b>Benefits of Approved Housing Societies</b></h4>

                <p><strong>Legal Assurance</strong></p>
                <p>Approved housing societies comply with all legal and regulatory requirements, providing peace of mind and protecting your investment.</p>

                <p><strong>Better Infrastructure</strong></p>
                <p>These societies are developed with proper infrastructure, including roads, drainage systems, and essential services.</p>

                <p><strong>High-Quality Amenities</strong></p>
                <p>Enjoy high-quality amenities such as parks, schools, shopping centers, and healthcare facilities within the community.</p>

                <p><strong>Safety and Security</strong></p>
                <p>Approved societies often have better security measures in place, ensuring a safe living environment for you and your family.</p>

                <h4><b>Note</b></h4>
                <p>Zameen Locator is here to make your property search smooth, reliable, and efficient. Discover top-approved housing societies online and find the perfect place to call home. Start exploring today and take the first step towards making your real estate dreams a reality.</p>
            </div>
        </div>
    </div>
</section>

