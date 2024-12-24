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
                <span class="ipn-subtitle text-white">Unapproved Societies</span>
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
                <h1 class="text-center" style="color:#2eca6a;font-size: 2.5rem;"><b>Zameen Locator Discover Illegal Housing Societies Online</b></h1>
                <p class="text-center">Discover unregistered housing societies and access reliable information on non-conforming developments with Zameen Locator, Discover the truth about unapproved housing societies, Check online status of all housing Societies data & Stay informed.</p>

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
                                                <td><i class="bi bi-x-square-fill text-danger"></i></td>
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
                <h3 style="color:#2eca6a; border:1px solid #ededed; background:#fbfbfb; padding:13px; width:100%; text-align:center;"><b>How to Identify Illegal Housing Societies</b></h3>

                <p>Check for the necessary approvals from local urban development authorities. This includes land use clearance, building permits, and environmental impact assessments.</p>

                <h4><b>How It Works</b></h4>
                <p><strong>Check Land Titles:</strong> Ensure that the land title is clear and free from disputes. It should be properly registered and legally converted for residential use.</p>

                <p><strong>Research Builder’s Reputation:</strong> Investigate the reputation and track record of the developer. Look for past projects and any legal issues or complaints associated with them.</p>

                <p><strong>Consult Local Authorities:</strong> Contact local municipal or urban planning bodies to verify the legality of the housing society. They can provide information on approved and illegal projects in the area.</p>

                <p><strong>Seek Legal Advice:</strong> Before making any investments, consult with a legal expert specializing in real estate. They can help verify the legal status of the housing society and provide guidance on the necessary due diligence.</p>

                <h4><b>Consequences of Living in Illegal Housing Societies</b></h4>
                <p><strong>Legal Action:</strong> Residents may face legal action from government authorities, including fines, demolition of unauthorized structures, or eviction.</p>

                <p><strong>Property Devaluation:</strong> Properties in illegal housing societies tend to have lower market value and can be difficult to sell.</p>

                <p><strong>Lack of Services:</strong> Residents may experience inadequate or non-existent municipal services, leading to poor living conditions.</p>

                <p><strong>Safety Risks:</strong> Non-compliance with building codes and safety regulations can result in hazardous living environments.</p>

                <h5><b>Note</b></h5>
                <p>Illegal housing societies pose serious risks. Before investing, thoroughly check approvals, verify land titles, research developers, consult local authorities, and seek legal advice. This helps avoid financial loss, legal issues, and unsafe living conditions.</p>
            </div>
        </div>
    </div>

</section>

