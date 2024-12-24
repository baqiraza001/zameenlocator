<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="modal-content" id="sign-up">
                    <div class="modal-body">
                        <h2 class="text-center">{{ trans('plugins/real-estate::dashboard.register-title') }}</h2>
                        <br>
                        @include(Theme::getThemeNamespace() . '::views.real-estate.account.auth.includes.messages')

                        <form method="POST" class="simple-form" action="{{ route('public.account.register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="first_name" type="text"
                                                   class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                   name="first_name" value="{{ old('first_name') }}" required autofocus
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.first_name') }}">
                                            <i class="ti-user"></i>
                                        </div>
                                        @if ($errors->has('first_name'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="last_name" type="text"
                                                   class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   name="last_name" value="{{ old('last_name') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.last_name') }}">
                                            <i class="ti-user"></i>
                                        </div>
                                        @if ($errors->has('last_name'))
                                            <span class="d-block invalid-feedback">
                                                 <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="email" type="email"
                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" value="{{ old('email') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.email') }}">
                                            <i class="ti-email"></i>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="username" type="text"
                                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                   name="username" value="{{ old('username') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.username') }}">
                                            <i class="ti-user"></i>
                                        </div>
                                        @if ($errors->has('username'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="city"
                                                    class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                    name="city"
                                                    required>
                                                    <option value="">Select City</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" {{ old('city', isset($agent->city) ? $agent->city : '') == $city->id ? 'selected' : '' }}>
                                                        {{ $city->city_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <i class="ti-location-pin"></i>
                                        </div>
                                        @if ($errors->has('city'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="area" type="text"
                                                   class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}"
                                                   name="area" value="{{ old('area') }}" required
                                                   placeholder="Dealing Area">
                                            <i class="ti-map"></i>
                                        </div>
                                        @if ($errors->has('area'))
                                            <span class="d-block invalid-feedback">
                                                 <strong>{{ $errors->first('area') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="address" type="text"
                                                   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                   name="address" value="{{ old('address') }}" required
                                                   placeholder="Address">
                                            <i class="ti-map"></i>
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="d-block invalid-feedback">
                                                 <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="password" type="password"
                                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   name="password" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.password') }}">
                                            <i class="ti-unlock"></i>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.password-confirmation') }}">
                                            <i class="ti-unlock"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @if (setting('enable_captcha') && is_plugin_active('captcha'))
                                <div class="form-group">
                                    {!! Captcha::display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width btn-theme-light-2 rounded">
                                    {{ trans('plugins/real-estate::dashboard.register-cta') }}
                                </button>
                            </div>

                            <div class="form-group text-center">
                                <p>{{ __('Have an account already?') }}
                                    <a href="{{ route('public.account.login') }}"
                                       class="link d-block d-sm-inline-block text-sm-left text-center">{{ __('Login') }}</a>
                                </p>
                            </div>

                            <div class="text-center">
                                {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\RealEstate\Models\Account::class) !!}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
        <div class="row">
            <div class="col-md-12" style="border:1px solid #ededed; background:white; padding:20px;">
        <h3 style="color:#2eca6a;border:1px solid #ededed; background:#fbfbfb; padding:13px; width:100%;"><center><strong>Benefits of Creating Real Estate Agent Profile</strong></center></h3>
               
               <strong>Increased Visibility</strong>
               <p>A well-crafted real estate agent profile allows you to showcase your expertise and services to potential clients. It makes you more visible and accessible to individuals searching for <strong>real estate professionals</strong> online.</p>
               </p>
               
                <b>Credibility and Trustworthiness</b>
               <p>A professional profile helps establish your credibility and trustworthiness as a <strong>real estate agent.</strong> It provides information about your qualifications, experience, and track record, instilling confidence in potential clients.</p>
               </p>
               
               <b>Personal Branding</b>
               <p>Your agent profile is an opportunity to build and promote your personal brand. You can highlight your unique selling points, such as niche expertise, market knowledge, or exceptional customer service, to differentiate yourself from competitors.</p>
               </p>
               
               <b>Showcase Listings</b>
               <p>An agent profile often includes a section to showcase your current listings. This allows you to market properties to a broader audience and attract potential buyers.</p>
               </p>
               
               <b>Client Testimonials</b>
               <p>Including client testimonials and reviews on your profile provides social proof of your competence and client satisfaction. Positive feedback from previous clients can influence prospective clients' decisions.</p>
               </p>
               
               <b>Contact Information</b>
               <p>Your profile typically includes contact information, making it easy for interested parties to reach out to you for inquiries, appointments, or consultations.</p>
               </p>

               <b>Networking Opportunities</b>
               <p>A professional profile can facilitate networking with other real estate professionals, including brokers, colleagues, and industry partners. Networking can lead to referrals and collaboration opportunities.</p>
               </p>

               <b>Educational Content</b>
               <p>You can use your profile to share informative content about the real estate market, <strong>home-buying or selling tips,</strong> and other relevant information. This positions you as a knowledgeable resource in your field.</p>
               </p>

               <b>SEO Benefits</b>
               <p>A well-optimized agent profile can improve your online visibility in search engine results. This means that potential clients searching for real estate services in your area are more likely to discover your profile.</p>
               </p>

                  <b>Lead Generation</b>
               <p>By showcasing your services and expertise on your profile, you can attract leads and inquiries from individuals actively seeking real estate assistance.</p>
               </p>
        
                 <b>Track Performance</b>
               <p>Many online platforms offer analytics tools that allow you to track the performance of your <strong>agent profile,</strong> such as the number of views, inquiries, and interactions it receives.</p>
               </p>
               
               </div>
             </div>
        
        
           </div>
       </div>
