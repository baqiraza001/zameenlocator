<!-- ============================ Page Title Start================================== -->
<div class="image-cover page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="ipt-title">{{ $account->name }} {{ __('Account Details') }}</h1>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Agency Name Start================================== -->
<section class="agent-page p-0 gray-simple">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="agency agency-list overlio-40">

                    <div class="agency-avatar">
                        @if ($account->avatar->url)
                        <img src="{{ RvMedia::getImageUrl($account->avatar->url, 'thumb') }}"
                        alt="{{ $account->name }}" class="img-thumbnail">
                        @else
                        <img src="{{ $account->avatar_url }}" alt="{{ $account->name }}" class="img-thumbnail">
                        @endif
                    </div>

                    <div class="agency-content">
                        <div class="agency-name">
                            <h4><a href="#">{{ $account->name }}</a></h4>
                            <span><i class="lni-phone-handset"></i>{{ $account->phone }}</span>
                        </div>

                        <div class="agency-desc">
                            <p>{{ $account->description }}</p>
                        </div>

                        <div class="prt-detio">
                            <span>{{ $totalProperties }} {{ __('Property') }}</span>
                        </div>

                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================ About Agency ================================== -->
<section class="min gray-simple">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
              <div class="sec-heading center">
                {!! Theme::partial('breadcrumb') !!}
            </div>
        </div>
    </div>
        @if($image1)
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <img src="{{ URL('/').'/'.$image1->img }}" style="width:100%;" alt="Agent Image">
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <!-- property main detail -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- Single Block Wrap -->
                <div class="block-wrap">

                    <div class="block-header">
                        <h4 class="block-title">{{ __('Agent info') }}</h4>
                    </div>

                    <div class="block-body">
                        <ul class="dw-proprty-info">
                            <li><strong>{{ __('Ceo') }}</strong>{{ $account->name }}</li>
                            <li><strong>{{ __('Email') }}</strong>{{ $account->email }}</li>
                            <li><strong>{{ __('Phone') }}</strong>{{ $account->phone }}</li>
                            <li><strong>{{ __('City') }}</strong>{{ $city->city_name }}</li>
                            <li class="mt-4"><strong>{{ __('Joined on') }}</strong> {{ $account->created_at->toDateString() }}
                                <li class="mt-4"><strong>{{ __('Dealing Area') }}</strong>{{ $account->area }}</li>
                                <li class="mt-4"><strong>{{ __('Office Address') }}</strong>{{ $account->address }}</li>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Single Block Wrap -->
                <div class="block-wraps">
                    <div class="block-wraps-header">
                        <div class="block-header">
                            <ul class="nav nav-tabs customize-tab" id="myTab" role="tablist">
                                @foreach ($propertiesRelated as $propertiesRelatedItem)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link @if ($loop->first) active @endif"
                                        id="tab-type-{{ $propertiesRelatedItem['type']->id }}"
                                        data-bs-toggle="tab"
                                        href="#tab-content-type-{{ $propertiesRelatedItem['type']->id }}"
                                        role="tab"
                                        aria-selected="true">{{ $propertiesRelatedItem['type']->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="block-body">
                                <div class="tab-content" id="myTabContent">
                                    @foreach ($propertiesRelated as $propertiesRelatedItem)
                                    <div class="tab-pane fade show @if ($loop->first) active @endif" role="tabpanel"
                                        id="tab-content-type-{{ $propertiesRelatedItem['type']->id }}"
                                        aria-labelledby="tab-type-{{ $propertiesRelatedItem['type']->id }}">
                                        <!-- row -->
                                        @if ($propertiesRelatedItem['properties']->count())
                                        <div class="row">
                                            @foreach ($propertiesRelatedItem['properties'] as $property)
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                {!! Theme::partial('real-estate.properties.item-grid', ['property' => $property, 'img_slider' => false]) !!}
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                                <nav class="d-flex justify-content-center pt-3">
                                                    {!! $propertiesRelatedItem['properties']->withQueryString()->links() !!}
                                                </nav>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                                <p class="item">{{ __('0 results') }}</p>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
