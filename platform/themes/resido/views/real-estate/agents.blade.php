<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="ipt-title">Real Estate Agents in {{ $city->city_name }}</h1>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Agent List Start ================================== -->
<section class="gray-simple">
    <div class="container">
        <div class="row">
            <div class="col text-center">
              <div class="sec-heading center">
                {!! Theme::partial('breadcrumb') !!}
            </div>
        </div>
    </div>
    @if ($accounts->count())
    <div class="row">
        @foreach($accounts as $account)
        <div class="col-lg-4 col-md-6 col-sm-12">
            {!! Theme::partial('real-estate.agents.item', compact('account')) !!}
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <nav class="d-flex justify-content-center pt-3">
                {!! $accounts->withQueryString()->links() !!}
            </nav>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <p class="item">{{ __('No agents found') }}</p>
        </div>
    </div>
    @endif
</div>
</section>
