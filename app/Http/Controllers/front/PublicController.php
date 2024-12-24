<?php
namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use App\Models\Society;
use App\Models\SocietyMap;
use App\Models\CountryMap;
use App\Models\AntiqueMap;
use App\Models\CityMasterPlan;
use App\Models\DownloadMap;
use App\Models\City;
use App\Models\District;
use App\Models\Diary;
use App\Models\Country;
use App\Models\Agent;
use App\Models\TourGuide;
use App\Models\Template;


use Illuminate\Http\Request;
use Botble\Theme\Facades\Theme;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\SeoHelper\SeoOpenGraph;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function legalSocieties(Request $request)
    {
        $image1 = DB::table('zl_images')
        ->where(['location' => 'socities1', 'status' => 1])
        ->first();

        $societies = Society::where('status', 1)
        ->with('city')
        ->paginate(50);

        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Zameen Locator: Pakistan's Real Estate Maps and Locations");

        $meta = new SeoOpenGraph();
       /* if ($category->img) {
            $meta->setImage(asset(BlogCategory::BLOG_CATEGORIES_IMAGES_PATH . $category->img));
        }*/
        $meta->setDescription("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setUrl(URL('/'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Approved Societies');

        return Theme::scope('front.legal-societies', compact('image1', 'societies'))
        ->render();
    }

    public function illegalSocieties(Request $request)
    {
        $image1 = DB::table('zl_images')
        ->where(['location' => 'socities1', 'status' => 1])
        ->first();

        $societies = Society::where('status', 0)
        ->with('city')
        ->paginate(50);

        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Zameen Locator: Pakistan's Real Estate Maps and Locations");

        $meta = new SeoOpenGraph();
       /* if ($category->img) {
            $meta->setImage(asset(BlogCategory::BLOG_CATEGORIES_IMAGES_PATH . $category->img));
        }*/
        $meta->setDescription("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setUrl(URL('/'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Unapproved Societies');

        return Theme::scope('front.illegal-societies', compact('image1', 'societies'))
        ->render();
    }

    public function societiesMaps(Request $request)
    {
        $image1 = DB::table('zl_images')
        ->where(['location' => 'allmaps1', 'status' => 1])
        ->first();

        $records = SocietyMap::select('master_plan', 'society_map_name', 'id')->paginate(12);

        SeoHelper::setTitle("Explore Pakistan Real Estate with Satellite Maps and Location")
        ->setDescription("Discover the best of Islamabad with our comprehensive guide to real estate, satellite location maps, and local attractions. Get insights into property investments and explore key areas and neighborhoods.");

        $meta = new SeoOpenGraph();
       /* if ($category->img) {
            $meta->setImage(asset(BlogCategory::BLOG_CATEGORIES_IMAGES_PATH . $category->img));
        }*/
        $meta->setDescription("Discover the best of Islamabad with our comprehensive guide to real estate, satellite location maps, and local attractions. Get insights into property investments and explore key areas and neighborhoods.");
        $meta->setUrl(URL('Front/maps'));
        $meta->setTitle("Explore Pakistan Real Estate with Satellite Maps and Location");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('All Maps List');

        return Theme::scope('front.societies-maps', compact('image1', 'records'))
        ->render();
    }

    public function countriesMaps(Request $request)
    {
        $ads = DB::table('zl_ads')->get();
        $records = CountryMap::select('flag', 'name', 'id')->paginate(12);

        SeoHelper::setTitle("Countries Maps, Region, Population, and History | Zameen Locator")
        ->setDescription("Discover detailed country maps, explore regional insights, analyze population data, and learn about historical contexts with Zameen Locator. Access valuable geographical information now.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/country-maps.jpg'));
        $meta->setDescription("Discover detailed country maps, explore regional insights, analyze population data, and learn about historical contexts with Zameen Locator. Access valuable geographical information now.");
        $meta->setUrl(URL('Front/country_map'));
        $meta->setTitle("Countries Maps, Region, Population, and History | Zameen Locator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Countries List');

        return Theme::scope('front.countries-maps', compact('records', 'ads'))
        ->render();
    }

    public function antiqueMaps(Request $request)
    {
        $records = AntiqueMap::select('des', 'name', 'id')->paginate(12);

        SeoHelper::setTitle("Discover Antique Maps with Zameen Locator | Cartographic Treasures")
        ->setDescription("Explore rare and historical antique maps from around the world. Discover the beauty and history of cartographic treasures and learn more about unique geographic artifacts with Zameen Locator.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/antique-maps.jpg'));
        $meta->setTitle("Discover Antique Maps with Zameen Locator | Cartographic Treasures");
        $meta->setDescription("Explore rare and historical antique maps from around the world. Discover the beauty and history of cartographic treasures and learn more about unique geographic artifacts with Zameen Locator.");
        $meta->setUrl(URL('Front/antique_map'));
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Antique Maps List');

        return Theme::scope('front.antique-maps', compact('records'))
        ->render();
    }

    public function cityMasterPlanMaps(Request $request)
    {
        $records = CityMasterPlan::select('des', 'name', 'id')->paginate(12);

        SeoHelper::setTitle("Pakistan Cities Development Master Plans Maps")
        ->setDescription("Explore master plan maps for cities across Pakistan to discover detailed layouts and development insights. Start exploring today to uncover the future of urban development in Pakistan's cities.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/antique-maps.jpg'));
        $meta->setTitle("Pakistan Cities Development Master Plans Maps");
        $meta->setDescription("Explore master plan maps for cities across Pakistan to discover detailed layouts and development insights. Start exploring today to uncover the future of urban development in Pakistan's cities.");
        $meta->setUrl(URL('Front/city_master_plan_maps'));
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('City Master Plan Maps List');

        return Theme::scope('front.city-master-plan-maps', compact('records'))
        ->render();
    }

    public function nhaRoadMap(Request $request)
    {
        $image1 = DB::table('zl_images')
        ->where(['location' => 'nha_road_map2', 'status' => 1])
        ->first();

        $records = SocietyMap::select('master_plan', 'society_map_name', 'id')->paginate(12);

        SeoHelper::setTitle("National Highway Authority (NHA) Road Map - Pakistan")
        ->setDescription("Explore the National Highway Authority (NHA) road map for Pakistan. Access detailed maps, essential data, and plan your journey with accurate and up-to-date information from NHA.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/nha-road-map-thumbnail.jpg'));
        $meta->setTitle("National Highway Authority (NHA) Road Map - Pakistan");
        $meta->setDescription("Explore the National Highway Authority (NHA) road map for Pakistan. Access detailed maps, essential data, and plan your journey with accurate and up-to-date information from NHA.");
        $meta->setUrl(URL('Front/nha_road_map'));
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('NHA Road Map');

        return Theme::scope('front.nha-road-map', compact('image1', 'records'))
        ->render();
    }

    public function downloadFreeMaps(Request $request)
    {
        $records = DownloadMap::select('des', 'name', 'id')->paginate(12);

        SeoHelper::setTitle("Download Housing Society Maps for Free – Quick and Simple")
        ->setDescription("Access a wide range of free housing society maps provided by Zameen Locator. Ideal for buyers, real estate agents, and developers looking for detailed maps.");

        $meta = new SeoOpenGraph();
        $meta->setTitle("Download Housing Society Maps for Free – Quick and Simple");
        $meta->setDescription("Access a wide range of free housing society maps provided by Zameen Locator. Ideal for buyers, real estate agents, and developers looking for detailed maps.");
        $meta->setUrl(URL('Front/download_free_maps'));
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Housing Society Maps List');

        return Theme::scope('front.download-free-maps', compact('records'))
        ->render();
    }

    public function cityWiseAgent(Request $request)
    {
        $image1 = DB::table('zl_images')
        ->where(['location' => 'city-wise-agent1', 'status' => 1])
        ->first();

        $records = City::select('city_name', 'city_image', 'id')->get();

        SeoHelper::setTitle("Locate Real Estate Agents by Cities | Zameen Locator")
        ->setDescription("Find and connect with top real estate agents across various cities. Explore profiles of agents, view their listings, and get expert assistance for buying or selling properties.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/agent-list.jpg'));
        $meta->setDescription("Find and connect with top real estate agents across various cities. Explore profiles of agents, view their listings, and get expert assistance for buying or selling properties.");
        $meta->setUrl(URL('city-wise-agent'));
        $meta->setTitle("Locate Real Estate Agents by Cities | Zameen Locator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Agents By Cities List');

        return Theme::scope('front.city-wise-agent', compact('records', 'image1'))
        ->render();
    }

    public function areaConverter(Request $request)
    {
        SeoHelper::setTitle("Area Unit Converter | Zameen Locator")
        ->setDescription("Convert land area measurements with Zameen Locator's Area Unit Converter. Easily switch between Marla, Kanal, Square Feet, Square Yard, and Square Meters for accurate property dimension calculations.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Convert land area measurements with Zameen Locator's Area Unit Converter. Easily switch between Marla, Kanal, Square Feet, Square Yard, and Square Meters for accurate property dimension calculations.");
        $meta->setUrl(URL('Front/area_converter'));
        $meta->setTitle("Area Unit Converter | Zameen Locator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.area-converter')
        ->render();
    }

    public function mortgageCalculator(Request $request)
    {
        SeoHelper::setTitle("Mortgage Home Loan Calculator")
        ->setDescription("Calculate your mortgage payments with our easy-to-use Home Loan Calculator. Get estimates for monthly payments, interest rates, and amortization schedules.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Calculate your mortgage payments with our easy-to-use Home Loan Calculator. Get estimates for monthly payments, interest rates, and amortization schedules.");
        $meta->setUrl(URL('Front/area_converter'));
        $meta->setTitle("Mortgage Home Loan Calculator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.mortgage-calculator')->render();
    }

    public function tourCities(Request $request, $country = null, $id = null)
    {
        $image1 = DB::table('zl_images')
        ->where(['location' => 'tour_cities1', 'status' => 1])
        ->first();

        $country1 = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $country));
        $title = ucwords($country1) . " Tour Cities";

        $records = City::select('city_name', 'city_image', 'id')->where('country', $id)->paginate(30);

        SeoHelper::setTitle($title)
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/country-maps.jpg'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('tour-cities/' . $country . '/' . $id));
        $meta->setTitle($title);
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add(ucwords($country1). ' Cities List');

        return Theme::scope('front.tour-cities', [
            'country' => $country,
            'id' => $id,
            'country1' => $country1,
            'title' => $title,
            'image1' => $image1,
            'records' => $records,
        ])->render();
    }

    public function tourGuides(Request $request, $country = null, $city = null)
    {
        $image1 = DB::table('zl_images')
        ->where(['location' => 'tour_guide_detail1', 'status' => 1])
        ->first();
        $image2 = DB::table('zl_images')
        ->where(['location' => 'tour_guide_detail2', 'status' => 1])
        ->first();

        $country1 = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $country));
        
        $city_name = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $city));
        $title = ucwords($city_name) . " Tour Guide";

        $city = City::select('*')->where('city_name', $city_name)->first();
        $records = TourGuide::select('*')->where(
            ['country' => $city->country, 'city' => $city->id, 'status' => 1]
        )->get();


        
        $cities = City::select('city_name', 'city_image', 'id')
        ->where('country', $city->country)
        ->where('id', '>', $city->id)
        ->limit(6)
        ->get();

        if ($cities->count() < 6) {
            // Calculate remaining cities to fetch if the count is less than 6
            $remaining = 6 - $cities->count();

            // Fetch cities with `id < $city->id` to fill the gap
            $additionalCities = City::select('city_name', 'city_image', 'id')
            ->where('country', $city->country)
            ->where('id', '<', $city->id)
            ->limit($remaining)
            ->get();

            // Merge both collections
            $cities = $cities->merge($additionalCities);
        }


        SeoHelper::setTitle($title)
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/country-maps.jpg'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('tour-guides/' . $country . '/' . $city));
        $meta->setTitle($title);
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Tour Guide');

        return Theme::scope('front.tour-guides', [
            'country' => $country,
            'country1' => $country1,
            'title' => $title,
            'image1' => $image1,
            'image2' => $image2,
            'city' => $city,
            'cities' => $cities,
            'records' => $records,
        ])->render();
    }


    public function tourCountries(Request $request)
    {
        $image1 = DB::table('zl_images')
        ->where(['location' => 'tour_country1', 'status' => 1])
        ->first();

        $title = "Travel Guide: Explore Every Corner of the Globe";

        $records = Country::select('*')->paginate(30);

        SeoHelper::setTitle($title)
        ->setDescription("Discover the ultimate travel guide to explore every corner of the globe. Get expert tips, destination highlights, and practical advice for your next adventure.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/country-maps.jpg'));
        $meta->setDescription("Discover the ultimate travel guide to explore every corner of the globe. Get expert tips, destination highlights, and practical advice for your next adventure.");
        $meta->setUrl(URL('tour-country'));
        $meta->setTitle($title);
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('All Countries List');

        return Theme::scope('front.tour-countries', [
            'image1' => $image1,
            'records' => $records,
        ])->render();
    }

    public function hajjUmrahGuide(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/area_converter'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.hajj-umrah-guide')->render();
    }

    public function dhaRoadMaps(Request $request)
    {
        $image1 = DB::table('zl_images')
        ->where(['location' => 'nha_road_map2', 'status' => 1])
        ->first();

        $ids = [437, 441, 461, 457, 462, 460, 458, 459, 472, 476, 477, 478, 479];

        $records = SocietyMap::select('master_plan', 'society_map_name', 'id')
        ->whereIn('id', $ids)
        ->orderBy('id', 'DESC')
        ->orderBy('priority')
        ->paginate(50);


        SeoHelper::setTitle("Maps of All Defence Housing Authority (DHA) Locations in Pakistan")
        ->setDescription("Explore detailed maps of all Defence Housing Authority (DHA) locations in Pakistan. Access comprehensive and updated maps for DHA properties across the country.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/images/dha-maps.jpg'));
        $meta->setTitle("Maps of All Defence Housing Authority (DHA) Locations in Pakistan");
        $meta->setDescription("Explore detailed maps of all Defence Housing Authority (DHA) locations in Pakistan. Access comprehensive and updated maps for DHA properties across the country.");
        $meta->setUrl(URL('Front/dha_road'));
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('DHA Road Maps');

        return Theme::scope('front.dha-road-map', compact('image1', 'records'))
        ->render();
    }

    public function dhaMapDetails(Request $request, $id = null, $title = null)
    {
        $title1 = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $title));
        $title1 = ucwords($title1);

        $societyMap = SocietyMap::select('*')->where('id', $id)->first();
        $city = City::select('city_name', 'city_image', 'id')->where('id', $societyMap->city_id)->first();
        $cities = City::select('city_name', 'city_image', 'id')->where('country', 1)->get();
        $district = District::select('district_name', 'id')->where('id', $societyMap->district)->first();

        $relatedMaps = SocietyMap::select('*')
        ->where('id', '>', $id)
        ->limit(5)
        ->get();

        if ($relatedMaps->count() < 5) {
            $remaining = 5 - $relatedMaps->count();

            $additionalRecords = SocietyMap::select('*')
            ->where('id', '<', $id)
            ->limit($remaining)
            ->get();

            $relatedMaps = $relatedMaps->merge($additionalRecords);
        }

        SeoHelper::setTitle($title1)
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/images/dha-maps.jpg'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('map/' . $id . '/' . $title));
        $meta->setTitle($title1);
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Map Details');

        return Theme::scope('front.dha-map-details', [
            'societyMap' => $societyMap,
            'city' => $city,
            'district' => $district,
            'cities' => $cities,
            'relatedMaps' => $relatedMaps,
        ])->render();
    }

    public function mapDetails(Request $request, $title = null, $id = null)
    {
        $title1 = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $title));
        $title1 = ucwords($title1);

        $mapDetails = DownloadMap::select('*')->where('id', $id)->first();

        SeoHelper::setTitle($title1)
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/images/dha-maps.jpg'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('map/' . $id . '/' . $title));
        $meta->setTitle($title1);
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Map Details');

        return Theme::scope('front.map-details', [
            'mapDetails' => $mapDetails,
        ])->render();
    }


    public function societyDetails(Request $request, $title = null, $id = null)
    {
        $title1 = ucwords("Zameen Locator: Pakistan's Real Estate Maps and Locations");

        $societyDetails = Society::select('*')->where('id', $id)->first();
        $city = City::select('city_name', 'city_image', 'id')->where('id', $societyDetails->city_id)->first();
        $district = District::select('district_name', 'id')->where('id', $societyDetails->district)->first();

        SeoHelper::setTitle($title1)
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('societies/' . $title . '/' . $id));
        $meta->setTitle($title1);
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Society Details');

        return Theme::scope('front.society-details', [
            'societyDetails' => $societyDetails,
            'city' => $city,
            'district' => $district,
        ])->render();
    }


    public function countryMapDetails(Request $request, $slug = null)
    {
        $title1 = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $slug));
        $title = ucwords($title1." Maps");

        $countryMapDetails = CountryMap::select('*')->where('name', $title1)->first();
        $relatedMaps = CountryMap::select('*')
        ->where('id', '>', $countryMapDetails->id)
        ->limit(5)
        ->get();

        if ($relatedMaps->count() < 5) {
            $remaining = 5 - $relatedMaps->count();

            $additionalRecords = CountryMap::select('*')
            ->where('id', '<', $countryMapDetails->id)
            ->limit($remaining)
            ->get();

            $relatedMaps = $relatedMaps->merge($additionalRecords);
        }

        SeoHelper::setTitle($title)
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('country-map-detail/' . $slug));
        $meta->setTitle($title);
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add($title1.' Map Details');

        return Theme::scope('front.country-map-details', [
            'countryMapDetails' => $countryMapDetails,
            'relatedMaps' => $relatedMaps,
            'country' => $title1,
        ])->render();
    }

    public function antiqueMapDetails(Request $request, $slug = null, $id = null)
    {
        $title1 = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $slug));
        $title = ucwords($title1);

        $antiqueMapDetails = AntiqueMap::select('*')->where('id', $id)->first();
        $relatedMaps = AntiqueMap::select('*')
        ->where('id', '>', $antiqueMapDetails->id)
        ->limit(5)
        ->get();

        if ($relatedMaps->count() < 5) {
            $remaining = 5 - $relatedMaps->count();

            $additionalRecords = AntiqueMap::select('*')
            ->where('id', '<', $antiqueMapDetails->id)
            ->limit($remaining)
            ->get();

            $relatedMaps = $relatedMaps->merge($additionalRecords);
        }

        SeoHelper::setTitle($title)
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('front/antique_detail/' . $slug.'/'.$id));
        $meta->setTitle($title);
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Society Details');

        return Theme::scope('front.antique-map-details', [
            'antiqueMapDetails' => $antiqueMapDetails,
            'relatedMaps' => $relatedMaps,
            'country' => $title1,
        ])->render();
    }

    public function masterPlanMapDetails(Request $request, $slug = null, $id = null)
    {
        $title1 = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $slug));
        $title = ucwords($title1);

        $masterPlanMapDetails = CityMasterPlan::select('*')->where('id', $id)->first();
        $relatedMaps = CityMasterPlan::select('*')
        ->where('id', '>', $masterPlanMapDetails->id)
        ->limit(5)
        ->get();

        if ($relatedMaps->count() < 5) {
            $remaining = 5 - $relatedMaps->count();

            $additionalRecords = CityMasterPlan::select('*')
            ->where('id', '<', $masterPlanMapDetails->id)
            ->limit($remaining)
            ->get();

            $relatedMaps = $relatedMaps->merge($additionalRecords);
        }

        SeoHelper::setTitle($title)
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('front/master_plan_detail/' . $slug.'/'.$id));
        $meta->setTitle($title);
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Society Details');

        return Theme::scope('front.master-plan-map-details', [
            'masterPlanMapDetails' => $masterPlanMapDetails,
            'relatedMaps' => $relatedMaps,
            'country' => $title1,
        ])->render();
    }


    public function pakCities(Request $request)
    {
        $title = "Zameen Locator HD Maps by Cities | Explore City Maps";

        $records = City::select('city_name', 'city_image', 'id')->where('country', 1)->paginate(30);

        SeoHelper::setTitle($title)
        ->setDescription("Explore high-definition maps of cities with Zameen Locator. Browse through our comprehensive city maps to find detailed information about various locations.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('path-to-default-image.jpg'));
        $meta->setDescription("Explore high-definition maps of cities with Zameen Locator. Browse through our comprehensive city maps to find detailed information about various locations.");
        $meta->setUrl(URL('Front/cities'));
        $meta->setTitle($title);
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('All Cities List');

        return Theme::scope('front.pak-cities', [
            'records' => $records,
        ])->render();
    }


    public function pakCityAllMaps(Request $request, $slug = null, $id = null)
    {
        $title1 = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $slug));

        $image1 = DB::table('zl_images')
        ->where(['location' => 'allmaps1', 'status' => 1])
        ->first();

        $title = "Explore Pakistan Real Estate with Satellite Maps and Location";

        $records = SocietyMap::select('master_plan', 'society_map_name', 'id')->where('city_id', $id)->paginate(12);

        SeoHelper::setTitle($title)
        ->setDescription("Discover the best of ".ucfirst($title1)." with our comprehensive guide to real estate, satellite location maps, and local attractions. Get insights into property investments and explore key areas and neighborhoods.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Discover the best of ".ucfirst($title1)." with our comprehensive guide to real estate, satellite location maps, and local attractions. Get insights into property investments and explore key areas and neighborhoods.");
        $meta->setTitle($title);
        $meta->setUrl(URL('maps/' . $slug.'/'.$id));
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add(ucfirst($title1).' All Maps List');

        return Theme::scope('front.pak-city-all-maps', compact('records', 'image1', 'title1'))
        ->render();
    }


    public function pakDiary(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/pdiary'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

         Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Property Diaries');

        $records = Diary::select('*')->where('status', 0)->get();

        return Theme::scope('front.pak-diary', compact('records'))
        ->render();
    }

    public function digitalTasbih(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/digital_tasbih'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

         Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add('Digital Tasbih');

        return Theme::scope('front.digital-tasbih')
        ->render();
    }

    public function bannersAdvertisement(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/banners_advertisement'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.banners-advertisement')->render();
    }

    public function leaderBoard(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/leader_board'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.leader-board')->render();
    }

    public function rightBanner(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/right_banner'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.right-banner')->render();
    }

    public function splashBanner(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/splash_banner'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.splash-banner')->render();
    }

    public function middleBanner(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/middle_banner'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.middle-banner')->render();
    }

    public function middleSearch(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/middle_search'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.middle-search')->render();
    }

    public function middleCategory(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/middle_category'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.middle-category')->render();
    }

    public function wallpaper(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/wallpaper'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.wallpaper')->render();
    }

    public function faqs(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/faqs'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.faqs')->render();
    }

    public function privacyPolicy(Request $request)
    {
        SeoHelper::setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations")
        ->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/zlogo.webp'));
        $meta->setDescription("Pakistan's leading real estate platform with detailed maps, location insights, calculators, construction and renovation estimators, and expert tour guides. Your ultimate resource for property decisions.");
        $meta->setUrl(URL('Front/privacy_policy'));
        $meta->setTitle("Zameen Locator: Pakistan's Real Estate Maps and Locations");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.privacy-policy')->render();
    }


    public function homeLoanCalculator(Request $request)
    {
        SeoHelper::setTitle("Home Loan & Finance Calculator")
        ->setDescription("Calculate your home loan payments with our convenient and easy-to-use home loan calculator. Get accurate results in minutes and make informed decisions about your mortgage or refinance. Start today and see how much you can save!");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Calculate your home loan payments with our convenient and easy-to-use home loan calculator. Get accurate results in minutes and make informed decisions about your mortgage or refinance. Start today and see how much you can save!");
        $meta->setUrl(URL('Front/home_loan'));
        $meta->setTitle("Home Loan & Finance Calculator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.home-loan-calculator')->render();
    }

    public function profitLossCalculator(Request $request)
    {
        SeoHelper::setTitle("Property Profit And Loss Calculator")
        ->setDescription("Calculate your property investment profits and losses with our comprehensive property profit and loss calculator. See the potential return on your investment and make sure you select the right properties for maximum profitability. Accurately assess your potential profits or losses today.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Calculate your property investment profits and losses with our comprehensive property profit and loss calculator. See the potential return on your investment and make sure you select the right properties for maximum profitability. Accurately assess your potential profits or losses today.");
        $meta->setUrl(URL('Front/Profit_Loss'));
        $meta->setTitle("Property Profit And Loss Calculator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.profit-loss-calculator')->render();
    }

    public function homeRenovationCalculator(Request $request)
    {
        SeoHelper::setTitle("Home Renovation Cost Estimator")
        ->setDescription("Get an accurate estimate of the cost of your renovation project with our free Renovation Cost Calculator. Quickly and easily calculate costs for materials, labor, and more. Get started now to gain a better understanding of the total cost of your project.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Get an accurate estimate of the cost of your renovation project with our free Renovation Cost Calculator. Quickly and easily calculate costs for materials, labor, and more. Get started now to gain a better understanding of the total cost of your project.");
        $meta->setUrl(URL('Front/home_renovation'));
        $meta->setTitle("Home Renovation Cost Estimator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.home-renovation-calculator')->render();
    }


    public function constructionCostCalculator(Request $request)
    {
        SeoHelper::setTitle("House Construction Cost Calculator")
        ->setDescription("Calculate your construction cost with our convenient and easy-to-use Construction calculator. Get accurate results in minutes and make informed decisions about your construction!");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Calculate your construction cost with our convenient and easy-to-use Construction calculator. Get accurate results in minutes and make informed decisions about your construction!");
        $meta->setUrl(URL('Front/construction_cost'));
        $meta->setTitle("House Construction Cost Calculator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.construction-cost-calculator')->render();
    }

     public function carLoanCalculator(Request $request)
    {
        SeoHelper::setTitle("Car Loan Calculator: Loan Terms And Interest Rate")
        ->setDescription("Calculate your monthly car loan payments with our free online calculator. Simply enter the loan amount, interest rate, and length of your loan to estimate how much you could be paying each month. Get an accurate estimate of your car loan payments today!");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Calculate your monthly car loan payments with our free online calculator. Simply enter the loan amount, interest rate, and length of your loan to estimate how much you could be paying each month. Get an accurate estimate of your car loan payments today!");
        $meta->setUrl(URL('Front/car_loan'));
        $meta->setTitle("Car Loan Calculator: Loan Terms And Interest Rate");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.car-loan-calculator')->render();
    }

     public function interiorDesignCalculator(Request $request)
    {
        SeoHelper::setTitle("Interior Design Cost Estimator for Homes | Zameen Locator")
        ->setDescription("Easily estimate the costs of your home with Zameen Locator’s Interior Design Cost Estimator. Our tool provides precise calculations for various design elements, helping you plan your budget effectively. Whether you're renovating a single room or your entire home, our estimator simplifies the process. Start planning your dream interior with confidence and stay within your budget.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Easily estimate the costs of your home with Zameen Locator’s Interior Design Cost Estimator. Our tool provides precise calculations for various design elements, helping you plan your budget effectively. Whether you're renovating a single room or your entire home, our estimator simplifies the process. Start planning your dream interior with confidence and stay within your budget.");
        $meta->setUrl(URL('Front/interior_design'));
        $meta->setTitle("Interior Design Cost Estimator for Homes | Zameen Locator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.interior-design-calculator')->render();
    }

     public function refinanceCalculator(Request $request)
    {
        SeoHelper::setTitle("Refinance Mortgage Calculator | Estimates with Zameen Locator")
        ->setDescription("Evaluate your mortgage refinancing options with the Zameen Locator Refinance Mortgage Calculator. Our advanced tool delivers precise estimates to help you discover potential savings and make informed decisions. Whether you're aiming to reduce interest rates or modify loan terms, our calculator provides detailed insights to optimize your refinancing strategy and enhance your financial planning.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Evaluate your mortgage refinancing options with the Zameen Locator Refinance Mortgage Calculator. Our advanced tool delivers precise estimates to help you discover potential savings and make informed decisions. Whether you're aiming to reduce interest rates or modify loan terms, our calculator provides detailed insights to optimize your refinancing strategy and enhance your financial planning.");
        $meta->setUrl(URL('Front/refinance'));
        $meta->setTitle("Refinance Mortgage Calculator | Estimates with Zameen Locator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.refinance-calculator')->render();
    }

     public function lifeInsuranceCalculator(Request $request)
    {
        SeoHelper::setTitle("Life Insurance and Financial Planning Calculator | Zameen Locator")
        ->setDescription("Plan your financial future with ease using our Life Insurance & Financial Planning Calculator from Zameen Locator. Whether you’re calculating life insurance needs or strategizing your financial goals, our tool provides quick, accurate insights to help you make informed decisions.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Plan your financial future with ease using our Life Insurance & Financial Planning Calculator from Zameen Locator. Whether you’re calculating life insurance needs or strategizing your financial goals, our tool provides quick, accurate insights to help you make informed decisions.");
        $meta->setUrl(URL('Front/life_insurance'));
        $meta->setTitle("Life Insurance and Financial Planning Calculator | Zameen Locator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.life-insurance-calculator')->render();
    }

     public function roiCalculator(Request $request)
    {
        SeoHelper::setTitle("Return on Investment (ROI) Calculator")
        ->setDescription("Determine your return on investment (ROI) quickly and accurately with our free ROI calculator. Input your investment costs and expected revenue to get a full picture of your potential profits. Get the insights you need to make informed decisions for your business.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Determine your return on investment (ROI) quickly and accurately with our free ROI calculator. Input your investment costs and expected revenue to get a full picture of your potential profits. Get the insights you need to make informed decisions for your business.");
        $meta->setUrl(URL('Front/roi'));
        $meta->setTitle("Return on Investment (ROI) Calculator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.roi-calculator')->render();
    }

    public function agentCommissionCalculator(Request $request)
    {
        SeoHelper::setTitle("Real Estate Agent Commission Calculator")
        ->setDescription("Estimate your commission accurately with our Real Estate Agent Commission Calculator. Calculate based on your sales performance and transactions with ease. Start calculating today and ensure you receive the right compensation for your efforts.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Estimate your commission accurately with our Real Estate Agent Commission Calculator. Calculate based on your sales performance and transactions with ease. Start calculating today and ensure you receive the right compensation for your efforts.");
        $meta->setUrl(URL('Front/agent_commission'));
        $meta->setTitle("Real Estate Agent Commission Calculator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.agent-commission-calculator')->render();
    }

    public function cryptoCalculator(Request $request)
    {
        SeoHelper::setTitle("Crypto Profit and Loss Calculator")
        ->setDescription("Get an overview of your crypto portfolio and maximize your profits. Our Crypto Profit/Loss Calculator helps you understand where you stand financially in the crypto market. Quickly calculate profits/losses on each of your trades and get detailed analysis on performance.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Get an overview of your crypto portfolio and maximize your profits. Our Crypto Profit/Loss Calculator helps you understand where you stand financially in the crypto market. Quickly calculate profits/losses on each of your trades and get detailed analysis on performance.");
        $meta->setUrl(URL('Front/crypto'));
        $meta->setTitle("Crypto Profit and Loss Calculator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.crypto-calculator')->render();
    }

    public function currencyConverterCalculator(Request $request)
    {
        SeoHelper::setTitle("Currency Converter: Real-Time Exchange Rate Calculator")
        ->setDescription("Easily convert currencies with our real-time exchange rate calculator. Get accurate and up-to-date rates for over 150 currencies, making international transactions simple.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Easily convert currencies with our real-time exchange rate calculator. Get accurate and up-to-date rates for over 150 currencies, making international transactions simple.");
        $meta->setUrl(URL('Front/currency_converter'));
        $meta->setTitle("Currency Converter: Real-Time Exchange Rate Calculator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        return Theme::scope('front.currency-converter-calculator')->render();
    }

    public function propertyLaws(Request $request)
    {
        SeoHelper::setTitle("Pakistan Property Laws and Taxes A Step-By-Step Guide")
        ->setDescription("Navigate Pakistan's property laws and taxes with our comprehensive step-by-step guide. Learn about property ownership, registration processes, tax obligations, and legal requirements. Whether you're a buyer, seller, or investor, get all the essential information you need to make informed decisions and stay compliant.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Navigate Pakistan's property laws and taxes with our comprehensive step-by-step guide. Learn about property ownership, registration processes, tax obligations, and legal requirements. Whether you're a buyer, seller, or investor, get all the essential information you need to make informed decisions and stay compliant.");
        $meta->setUrl(URL('Front/property_laws'));
        $meta->setTitle("Pakistan Property Laws and Taxes A Step-By-Step Guide");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        $records = Template::select('*')->get();

        return Theme::scope('front.property-laws', compact('records'))->render();
    }

    public function landRecordOnline(Request $request)
    {
        SeoHelper::setTitle("Explore Punjab and Sindh Land Records Online")
        ->setDescription("Zameenlocator Land Records provides a user-friendly platform offering easy access to Punjab and Sindh land records. Discover verified property details, check ownership online, access transaction history, and explore comprehensive land records effortlessly through our digital interface.");

        $meta = new SeoOpenGraph();
        $meta->setImage(asset('assets/front/img/unit-converter.jpg'));
        $meta->setDescription("Zameenlocator Land Records provides a user-friendly platform offering easy access to Punjab and Sindh land records. Discover verified property details, check ownership online, access transaction history, and explore comprehensive land records effortlessly through our digital interface.");
        $meta->setUrl(URL('Front/land_record_online'));
        $meta->setTitle("Explore Punjab and Sindh Land Records Online");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        $records = Template::select('*')->get();

        return Theme::scope('front.land-record-online', compact('records'))->render();
    }

}
