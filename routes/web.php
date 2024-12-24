<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocietyMapsController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\AdvertismentController;
use App\Http\Controllers\LandingSliderController;
use App\Http\Controllers\DownloadMapsController;
use App\Http\Controllers\AntiqueMapsController;
use App\Http\Controllers\CityMasterPlanController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\IslamicController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\CountryMapController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\TestimonialSliderController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\TourGuideController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\HomeImagesController;
use App\Http\Controllers\WebsiteSettingController;

use App\Http\Controllers\front\PublicController;


Route::group(['namespace' => 'Botble\Payment\Http\Controllers', 'middleware' => ['web', 'core']], function () {
	Route::group(['prefix' => 'admin/zameenlocator', 'as' => 'admin.zameenlocator.', 'middleware' => 'auth'], function () {
		
		Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
		Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

		//society-maps
		Route::get('/society-maps', [SocietyMapsController::class, 'index'])->name('society-maps.index');
		Route::post('/society-maps', [SocietyMapsController::class, 'index'])->name('society-maps.index');
		Route::get('/society-maps/create', [SocietyMapsController::class, 'create'])->name('society-maps.create');
		Route::post('/society-maps/create', [SocietyMapsController::class, 'store'])->name('society-maps.store');
		Route::get('/society-maps/edit/{id}', [SocietyMapsController::class, 'edit'])->name('society-maps.edit');
		Route::put('/society-maps/edit/{id}', [SocietyMapsController::class, 'update'])->name('society-maps.update');
		Route::delete('/society-maps/delete/{id}', [SocietyMapsController::class, 'destroy'])->name('society-maps.destroy');
		Route::get('/society-maps/{id}', [SocietyMapsController::class, 'show'])->name('society-maps.show');
		Route::get('/maps/fetch', [SocietyMapsController::class, 'fetchMaps'])->name('society-maps.fetch');

		//societies
		Route::get('/societies', [SocietyController::class, 'index'])->name('societies.index');
		Route::post('/societies', [SocietyController::class, 'index'])->name('societies.index');
		Route::get('/societies/create', [SocietyController::class, 'create'])->name('societies.create');
		Route::post('/societies/create', [SocietyController::class, 'store'])->name('societies.store');
		Route::get('/societies/edit/{id}', [SocietyController::class, 'edit'])->name('societies.edit');
		Route::put('/societies/edit/{id}', [SocietyController::class, 'update'])->name('societies.update');
		Route::delete('/societies/delete/{id}', [SocietyController::class, 'destroy'])->name('societies.destroy');
		Route::get('/societies/{id}', [SocietyController::class, 'show'])->name('societies.show');

		//advertisments
		Route::get('/advertisments', [AdvertismentController::class, 'index'])->name('advertisments.index');
		Route::post('/advertisments', [AdvertismentController::class, 'index'])->name('advertisments.index');
		Route::get('/advertisments/create', [AdvertismentController::class, 'create'])->name('advertisments.create');
		Route::post('/advertisments/create', [AdvertismentController::class, 'store'])->name('advertisments.store');
		Route::get('/advertisments/edit/{id}', [AdvertismentController::class, 'edit'])->name('advertisments.edit');
		Route::put('/advertisments/edit/{id}', [AdvertismentController::class, 'update'])->name('advertisments.update');
		Route::delete('/advertisments/delete/{id}/{type}', [AdvertismentController::class, 'destroy'])->name('advertisments.destroy');
		Route::get('/advertisments/{id}', [AdvertismentController::class, 'show'])->name('advertisments.show');

		//landing sliders
		Route::get('/landing-sliders', [LandingSliderController::class, 'index'])->name('landing-sliders.index');
		Route::post('/landing-sliders', [LandingSliderController::class, 'index'])->name('landing-sliders.index');
		Route::get('/landing-sliders/create', [LandingSliderController::class, 'create'])->name('landing-sliders.create');
		Route::post('/landing-sliders/create', [LandingSliderController::class, 'store'])->name('landing-sliders.store');
		Route::get('/landing-sliders/edit/{id}', [LandingSliderController::class, 'edit'])->name('landing-sliders.edit');
		Route::put('/landing-sliders/edit/{id}', [LandingSliderController::class, 'update'])->name('landing-sliders.update');
		Route::delete('/landing-sliders/delete/{id}', [LandingSliderController::class, 'destroy'])->name('landing-sliders.destroy');
		Route::get('/landing-sliders/{id}', [LandingSliderController::class, 'show'])->name('landing-sliders.show');


		//download-maps
		Route::get('/download-maps', [DownloadMapsController::class, 'index'])->name('download-maps.index');
		Route::post('/download-maps', [DownloadMapsController::class, 'index'])->name('download-maps.index');
		Route::get('/download-maps/create', [DownloadMapsController::class, 'create'])->name('download-maps.create');
		Route::post('/download-maps/create', [DownloadMapsController::class, 'store'])->name('download-maps.store');
		Route::get('/download-maps/edit/{id}', [DownloadMapsController::class, 'edit'])->name('download-maps.edit');
		Route::put('/download-maps/edit/{id}', [DownloadMapsController::class, 'update'])->name('download-maps.update');
		Route::delete('/download-maps/delete/{id}', [DownloadMapsController::class, 'destroy'])->name('download-maps.destroy');
		Route::get('/download-maps/{id}', [DownloadMapsController::class, 'show'])->name('download-maps.show');


		//antique-maps
		Route::get('/antique-maps', [AntiqueMapsController::class, 'index'])->name('antique-maps.index');
		Route::post('/antique-maps', [AntiqueMapsController::class, 'index'])->name('antique-maps.index');
		Route::get('/antique-maps/create', [AntiqueMapsController::class, 'create'])->name('antique-maps.create');
		Route::post('/antique-maps/create', [AntiqueMapsController::class, 'store'])->name('antique-maps.store');
		Route::get('/antique-maps/edit/{id}', [AntiqueMapsController::class, 'edit'])->name('antique-maps.edit');
		Route::put('/antique-maps/edit/{id}', [AntiqueMapsController::class, 'update'])->name('antique-maps.update');
		Route::delete('/antique-maps/delete/{id}', [AntiqueMapsController::class, 'destroy'])->name('antique-maps.destroy');
		Route::get('/antique-maps/{id}', [AntiqueMapsController::class, 'show'])->name('antique-maps.show');


		//city-master-plan
		Route::get('/city-master-plan', [CityMasterPlanController::class, 'index'])->name('city-master-plan.index');
		Route::post('/city-master-plan', [CityMasterPlanController::class, 'index'])->name('city-master-plan.index');
		Route::get('/city-master-plan/create', [CityMasterPlanController::class, 'create'])->name('city-master-plan.create');
		Route::post('/city-master-plan/create', [CityMasterPlanController::class, 'store'])->name('city-master-plan.store');
		Route::get('/city-master-plan/edit/{id}', [CityMasterPlanController::class, 'edit'])->name('city-master-plan.edit');
		Route::put('/city-master-plan/edit/{id}', [CityMasterPlanController::class, 'update'])->name('city-master-plan.update');
		Route::delete('/city-master-plan/delete/{id}', [CityMasterPlanController::class, 'destroy'])->name('city-master-plan.destroy');
		Route::get('/city-master-plan/{id}', [CityMasterPlanController::class, 'show'])->name('city-master-plan.show');


		//templates
		Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
		Route::post('/templates', [TemplateController::class, 'index'])->name('templates.index');
		Route::get('/templates/create', [TemplateController::class, 'create'])->name('templates.create');
		Route::post('/templates/create', [TemplateController::class, 'store'])->name('templates.store');
		Route::get('/templates/edit/{id}', [TemplateController::class, 'edit'])->name('templates.edit');
		Route::put('/templates/edit/{id}', [TemplateController::class, 'update'])->name('templates.update');
		Route::delete('/templates/delete/{id}', [TemplateController::class, 'destroy'])->name('templates.destroy');
		Route::get('/templates/{id}', [TemplateController::class, 'show'])->name('templates.show');


		//blogs
		Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
		Route::post('/blogs', [BlogController::class, 'index'])->name('blogs.index');
		Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
		Route::post('/blogs/create', [BlogController::class, 'store'])->name('blogs.store');
		Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
		Route::put('/blogs/edit/{id}', [BlogController::class, 'update'])->name('blogs.update');
		Route::delete('/blogs/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
		Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');


		//blogs-categories
		Route::get('/blogs-categories', [BlogCategoryController::class, 'index'])->name('blogs-categories.index');
		Route::post('/blogs-categories', [BlogCategoryController::class, 'index'])->name('blogs-categories.index');
		Route::get('/blogs-categories/create', [BlogCategoryController::class, 'create'])->name('blogs-categories.create');
		Route::post('/blogs-categories/create', [BlogCategoryController::class, 'store'])->name('blogs-categories.store');
		Route::get('/blogs-categories/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blogs-categories.edit');
		Route::put('/blogs-categories/edit/{id}', [BlogCategoryController::class, 'update'])->name('blogs-categories.update');
		Route::delete('/blogs-categories/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('blogs-categories.destroy');
		Route::get('/blogs-categories/{id}', [BlogCategoryController::class, 'show'])->name('blogs-categories.show');


		//islamic
		Route::get('/islamic', [IslamicController::class, 'index'])->name('islamic.index');
		Route::post('/islamic', [IslamicController::class, 'index'])->name('islamic.index');
		Route::get('/islamic/create', [IslamicController::class, 'create'])->name('islamic.create');
		Route::post('/islamic/create', [IslamicController::class, 'store'])->name('islamic.store');
		Route::get('/islamic/edit/{id}', [IslamicController::class, 'edit'])->name('islamic.edit');
		Route::put('/islamic/edit/{id}', [IslamicController::class, 'update'])->name('islamic.update');
		Route::delete('/islamic/delete/{id}', [IslamicController::class, 'destroy'])->name('islamic.destroy');
		Route::get('/islamic/{id}', [IslamicController::class, 'show'])->name('islamic.show');


		//maps
		Route::get('/maps', [MapController::class, 'index'])->name('maps.index');
		Route::post('/maps', [MapController::class, 'index'])->name('maps.index');
		Route::get('/maps/create', [MapController::class, 'create'])->name('maps.create');
		Route::post('/maps/create', [MapController::class, 'store'])->name('maps.store');
		Route::get('/maps/edit/{id}', [MapController::class, 'edit'])->name('maps.edit');
		Route::put('/maps/edit/{id}', [MapController::class, 'update'])->name('maps.update');
		Route::delete('/maps/delete/{id}', [MapController::class, 'destroy'])->name('maps.destroy');
		Route::get('/maps/{id}', [MapController::class, 'show'])->name('maps.show');


		//countries-maps
		Route::get('/countries-maps', [CountryMapController::class, 'index'])->name('countries-maps.index');
		Route::post('/countries-maps', [CountryMapController::class, 'index'])->name('countries-maps.index');
		Route::get('/countries-maps/create', [CountryMapController::class, 'create'])->name('countries-maps.create');
		Route::post('/countries-maps/create', [CountryMapController::class, 'store'])->name('countries-maps.store');
		Route::get('/countries-maps/edit/{id}', [CountryMapController::class, 'edit'])->name('countries-maps.edit');
		Route::put('/countries-maps/edit/{id}', [CountryMapController::class, 'update'])->name('countries-maps.update');
		Route::delete('/countries-maps/delete/{id}', [CountryMapController::class, 'destroy'])->name('countries-maps.destroy');
		Route::get('/countries-maps/{id}', [CountryMapController::class, 'show'])->name('countries-maps.show');


		//countries
		Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
		Route::post('/countries', [CountryController::class, 'index'])->name('countries.index');
		Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');
		Route::post('/countries/create', [CountryController::class, 'store'])->name('countries.store');
		Route::get('/countries/edit/{id}', [CountryController::class, 'edit'])->name('countries.edit');
		Route::put('/countries/edit/{id}', [CountryController::class, 'update'])->name('countries.update');
		Route::delete('/countries/delete/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');
		Route::get('/countries/{id}', [CountryController::class, 'show'])->name('countries.show');


		//cities
		Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
		Route::post('/cities', [CityController::class, 'index'])->name('cities.index');
		Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
		Route::post('/cities/create', [CityController::class, 'store'])->name('cities.store');
		Route::get('/cities/edit/{id}', [CityController::class, 'edit'])->name('cities.edit');
		Route::put('/cities/edit/{id}', [CityController::class, 'update'])->name('cities.update');
		Route::delete('/cities/delete/{id}', [CityController::class, 'destroy'])->name('cities.destroy');
		Route::get('/cities/{id}', [CityController::class, 'show'])->name('cities.show');


		//districts
		Route::get('/districts', [DistrictController::class, 'index'])->name('districts.index');
		Route::post('/districts', [DistrictController::class, 'index'])->name('districts.index');
		Route::get('/districts/create', [DistrictController::class, 'create'])->name('districts.create');
		Route::post('/districts/create', [DistrictController::class, 'store'])->name('districts.store');
		Route::get('/districts/edit/{id}', [DistrictController::class, 'edit'])->name('districts.edit');
		Route::put('/districts/edit/{id}', [DistrictController::class, 'update'])->name('districts.update');
		Route::delete('/districts/delete/{id}', [DistrictController::class, 'destroy'])->name('districts.destroy');
		Route::get('/districts/{id}', [DistrictController::class, 'show'])->name('districts.show');


		//testimonial-sliders
		Route::get('/testimonial-sliders', [TestimonialSliderController::class, 'index'])->name('testimonial-sliders.index');
		Route::post('/testimonial-sliders', [TestimonialSliderController::class, 'index'])->name('testimonial-sliders.index');
		Route::get('/testimonial-sliders/create', [TestimonialSliderController::class, 'create'])->name('testimonial-sliders.create');
		Route::post('/testimonial-sliders/create', [TestimonialSliderController::class, 'store'])->name('testimonial-sliders.store');
		Route::get('/testimonial-sliders/edit/{id}', [TestimonialSliderController::class, 'edit'])->name('testimonial-sliders.edit');
		Route::put('/testimonial-sliders/edit/{id}', [TestimonialSliderController::class, 'update'])->name('testimonial-sliders.update');
		Route::delete('/testimonial-sliders/delete/{id}', [TestimonialSliderController::class, 'destroy'])->name('testimonial-sliders.destroy');
		Route::get('/testimonial-sliders/{id}', [TestimonialSliderController::class, 'show'])->name('testimonial-sliders.show');


		//agents
		Route::get('/agents', [AgentController::class, 'index'])->name('agents.index');
		Route::post('/agents', [AgentController::class, 'index'])->name('agents.index');
		Route::get('/agents/create', [AgentController::class, 'create'])->name('agents.create');
		Route::post('/agents/create', [AgentController::class, 'store'])->name('agents.store');
		Route::get('/agents/edit/{id}', [AgentController::class, 'edit'])->name('agents.edit');
		Route::put('/agents/edit/{id}', [AgentController::class, 'update'])->name('agents.update');
		Route::delete('/agents/delete/{id}', [AgentController::class, 'destroy'])->name('agents.destroy');
		Route::get('/agents/{id}', [AgentController::class, 'show'])->name('agents.show');
		Route::put('/agents/update-status/{id}', [AgentController::class, 'updateStatus'])->name('agents.update-status');


		//diaries
		Route::get('/diaries', [DiaryController::class, 'index'])->name('diaries.index');
		Route::post('/diaries', [DiaryController::class, 'index'])->name('diaries.index');
		Route::get('/diaries/create', [DiaryController::class, 'create'])->name('diaries.create');
		Route::post('/diaries/create', [DiaryController::class, 'store'])->name('diaries.store');
		Route::get('/diaries/edit/{id}', [DiaryController::class, 'edit'])->name('diaries.edit');
		Route::put('/diaries/edit/{id}', [DiaryController::class, 'update'])->name('diaries.update');
		Route::delete('/diaries/delete/{id}', [DiaryController::class, 'destroy'])->name('diaries.destroy');
		Route::get('/diaries/{id}', [DiaryController::class, 'show'])->name('diaries.show');
		Route::put('/diaries/update-status/{id}', [DiaryController::class, 'updateStatus'])->name('diaries.update-status');


		//tour-guides
		Route::get('/tour-guides', [TourGuideController::class, 'index'])->name('tour-guides.index');
		Route::post('/tour-guides', [TourGuideController::class, 'index'])->name('tour-guides.index');
		Route::get('/tour-guides/create', [TourGuideController::class, 'create'])->name('tour-guides.create');
		Route::post('/tour-guides/create', [TourGuideController::class, 'store'])->name('tour-guides.store');
		Route::get('/tour-guides/edit/{id}', [TourGuideController::class, 'edit'])->name('tour-guides.edit');
		Route::put('/tour-guides/edit/{id}', [TourGuideController::class, 'update'])->name('tour-guides.update');
		Route::delete('/tour-guides/delete/{id}', [TourGuideController::class, 'destroy'])->name('tour-guides.destroy');
		Route::get('/tour-guides/{id}', [TourGuideController::class, 'show'])->name('tour-guides.show');
		Route::post('/tour-guides/get-city', [TourGuideController::class, 'getCity'])->name('tour-guides.get-city');


		//popups
		Route::get('/popups', [PopupController::class, 'index'])->name('popups.index');
		Route::post('/popups', [PopupController::class, 'index'])->name('popups.index');
		Route::get('/popups/create', [PopupController::class, 'create'])->name('popups.create');
		Route::post('/popups/create', [PopupController::class, 'store'])->name('popups.store');
		Route::get('/popups/edit/{id}', [PopupController::class, 'edit'])->name('popups.edit');
		Route::put('/popups/edit/{id}', [PopupController::class, 'update'])->name('popups.update');
		Route::delete('/popups/delete/{id}', [PopupController::class, 'destroy'])->name('popups.destroy');
		Route::get('/popups/{id}', [PopupController::class, 'show'])->name('popups.show');
		Route::put('/popups/update-status/{id}', [PopupController::class, 'updateStatus'])->name('popups.update-status');


		//home-images
		Route::get('/home-images', [HomeImagesController::class, 'index'])->name('home-images.index');
		Route::post('/home-images', [HomeImagesController::class, 'index'])->name('home-images.index');
		Route::get('/home-images/create', [HomeImagesController::class, 'create'])->name('home-images.create');
		Route::post('/home-images/create', [HomeImagesController::class, 'store'])->name('home-images.store');
		Route::get('/home-images/edit/{id}', [HomeImagesController::class, 'edit'])->name('home-images.edit');
		Route::put('/home-images/edit/{id}', [HomeImagesController::class, 'update'])->name('home-images.update');
		Route::delete('/home-images/delete/{id}', [HomeImagesController::class, 'destroy'])->name('home-images.destroy');
		Route::get('/home-images/{id}', [HomeImagesController::class, 'show'])->name('home-images.show');
		Route::put('/home-images/update-status/{id}', [HomeImagesController::class, 'updateStatus'])->name('home-images.update-status');


		//website-settings
		Route::get('/website-settings', [WebsiteSettingController::class, 'index'])->name('website-settings.index');
		Route::post('/website-settings', [WebsiteSettingController::class, 'index'])->name('website-settings.index');
		Route::get('/website-settings/create', [WebsiteSettingController::class, 'create'])->name('website-settings.create');
		Route::post('/website-settings/create', [WebsiteSettingController::class, 'store'])->name('website-settings.store');
		Route::get('/website-settings/edit', [WebsiteSettingController::class, 'edit'])->name('website-settings.edit');
		Route::put('/website-settings/edit', [WebsiteSettingController::class, 'update'])->name('website-settings.update');
		Route::delete('/website-settings/delete', [WebsiteSettingController::class, 'destroy'])->name('website-settings.destroy');

	});

});

Route::group(['namespace' => 'App\Http\Controllers\front', 'middleware' => ['web', 'core']], function () {

	Route::get('Front/legal', [
		'as' => 'front.legal-societies',
		'uses' => 'PublicController@legalSocieties',
	]);

	Route::get('Front/illegal', [
		'as' => 'front.illegal-societies',
		'uses' => 'PublicController@illegalSocieties',
	]);

	Route::get('Front/maps', [
		'as' => 'front.societies-maps',
		'uses' => 'PublicController@societiesMaps',
	]);
	Route::get('Front/country_map', [
		'as' => 'front.country-map',
		'uses' => 'PublicController@countriesMaps',
	]);
	Route::get('Front/antique_map', [
		'as' => 'front.antique-map',
		'uses' => 'PublicController@antiqueMaps',
	]);
	Route::get('front/antique_detail/{slug}/{id}', [
		'as' => 'front.antique-map-details',
		'uses' => 'PublicController@antiqueMapDetails',
	]);
	Route::get('Front/city_master_plan_maps', [
		'as' => 'front.city-master-plan-maps',
		'uses' => 'PublicController@cityMasterPlanMaps',
	]);
	Route::get('Front/nha_road_map', [
		'as' => 'front.nha-road-map',
		'uses' => 'PublicController@nhaRoadMap',
	]);
	Route::get('Front/download_free_maps', [
		'as' => 'front.download-free-maps',
		'uses' => 'PublicController@downloadFreeMaps',
	]);

	Route::get('city-wise-agent', [
		'as' => 'city-wise-agent',
		'uses' => 'PublicController@cityWiseAgent',
	]);

	Route::get('Front/area_converter', [
		'as' => 'area-converter',
		'uses' => 'PublicController@areaConverter',
	]);
	Route::get('Front/mortgage_calculator', [
		'as' => 'mortgage-calculator',
		'uses' => 'PublicController@mortgageCalculator',
	]);

	Route::get('tour-cities/{slug}/{id}', [
		'as' => 'tour-cities',
		'uses' => 'PublicController@tourCities',
	]);

	Route::get('tour-guide/{country}/{city}', [
		'as' => 'tour-guide',
		'uses' => 'PublicController@tourGuides',
	]);

	Route::get('tour-country', [
		'as' => 'tour-countries',
		'uses' => 'PublicController@tourCountries',
	]);

	Route::get('Front/hajj_umrah_guide', [
		'as' => 'hajj-umrah-guide',
		'uses' => 'PublicController@hajjUmrahGuide',
	]);

	Route::get('Front/dha_map', [
		'as' => 'front.dha-road-map',
		'uses' => 'PublicController@dhaRoadMaps',
	]);


	Route::get('map/{id}/{slug}', [
		'as' => 'front.dha-map-details',
		'uses' => 'PublicController@dhaMapDetails',
	]);

	Route::get('map_detail/{slug}/{id}', [
		'as' => 'front.map-details',
		'uses' => 'PublicController@mapDetails',
	]);

	Route::get('societies/{slug}/{id}', [
		'as' => 'front.society-details',
		'uses' => 'PublicController@societyDetails',
	]);

	Route::get('country-map-detail/{slug}', [
		'as' => 'front.country-map-details',
		'uses' => 'PublicController@countryMapDetails',
	]);

	Route::get('front/master_plan_detail/{slug}/{id}', [
		'as' => 'front.master-plan-map-details',
		'uses' => 'PublicController@masterPlanMapDetails',
	]);

	Route::get('Front/cities', [
		'as' => 'tour-pak-cities',
		'uses' => 'PublicController@pakCities',
	]);

	Route::get('maps/{slug}/{id}', [
		'as' => 'front.pak-city-all-maps',
		'uses' => 'PublicController@pakCityAllMaps',
	]);


	Route::get('Front/pdiary', [
		'as' => 'tour-pak-diary',
		'uses' => 'PublicController@pakDiary',
	]);

	Route::get('Front/digital_tasbih', [
		'as' => 'digital-tasbih',
		'uses' => 'PublicController@digitalTasbih',
	]);

	Route::get('Front/banners_advertisement', [
		'as' => 'banners-advertisement',
		'uses' => 'PublicController@bannersAdvertisement',
	]);

	Route::get('Front/leader_board', [
		'as' => 'leader-board',
		'uses' => 'PublicController@leaderBoard',
	]);

	Route::get('Front/right_banner', [
		'as' => 'right-banner',
		'uses' => 'PublicController@rightBanner',
	]);

	Route::get('Front/splash_banner', [
		'as' => 'splash-banner',
		'uses' => 'PublicController@splashBanner',
	]);

	Route::get('Front/middle_banner', [
		'as' => 'middle-banner',
		'uses' => 'PublicController@middleBanner',
	]);

	Route::get('Front/middle_search', [
		'as' => 'middle-search',
		'uses' => 'PublicController@middleSearch',
	]);

	Route::get('Front/middle_category', [
		'as' => 'middle-category',
		'uses' => 'PublicController@middleCategory',
	]);

	Route::get('Front/wallpaper', [
		'as' => 'wallpaper',
		'uses' => 'PublicController@wallpaper',
	]);

	Route::get('Front/Faqs', [
		'as' => 'faqs',
		'uses' => 'PublicController@faqs',
	]);

	Route::get('Front/contact', function () {
    return redirect('/contact');
  });

  Route::get('Front/privacy_policy', [
		'as' => 'privacy-policy',
		'uses' => 'PublicController@privacyPolicy',
	]);

	Route::get('Front/home_loan', [
		'as' => 'home-loan-calculator',
		'uses' => 'PublicController@homeLoanCalculator',
	]);

	Route::get('Front/Profit_Loss', [
		'as' => 'profit-loss-calculator',
		'uses' => 'PublicController@profitLossCalculator',
	]);

	Route::get('Front/home_renovation', [
		'as' => 'home-renovation-calculator',
		'uses' => 'PublicController@homeRenovationCalculator',
	]);

	Route::get('Front/construction_cost', [
		'as' => 'construction-cost-calculator',
		'uses' => 'PublicController@constructionCostCalculator',
	]);

	Route::get('Front/car_loan', [
		'as' => 'car-loan-calculator',
		'uses' => 'PublicController@carLoanCalculator',
	]);

	Route::get('Front/interior_design', [
		'as' => 'interior-design-calculator',
		'uses' => 'PublicController@interiorDesignCalculator',
	]);

	Route::get('Front/refinance', [
		'as' => 'refinance-calculator',
		'uses' => 'PublicController@refinanceCalculator',
	]);

	Route::get('Front/life_insurance', [
		'as' => 'life-insurance-calculator',
		'uses' => 'PublicController@lifeInsuranceCalculator',
	]);

	Route::get('Front/roi', [
		'as' => 'roi-calculator',
		'uses' => 'PublicController@roiCalculator',
	]);

	Route::get('Front/agent_commission', [
		'as' => 'agent-commission-calculator',
		'uses' => 'PublicController@agentCommissionCalculator',
	]);

	Route::get('Front/crypto', [
		'as' => 'crypto-calculator',
		'uses' => 'PublicController@cryptoCalculator',
	]);

	Route::get('Front/currency_converter', [
		'as' => 'currency-converter-calculator',
		'uses' => 'PublicController@currencyConverterCalculator',
	]);

	Route::get('Front/property_laws', [
		'as' => 'property-laws',
		'uses' => 'PublicController@propertyLaws',
	]);

	Route::get('Front/land_record_online', [
		'as' => 'land-record-online',
		'uses' => 'PublicController@landRecordOnline',
	]);

});