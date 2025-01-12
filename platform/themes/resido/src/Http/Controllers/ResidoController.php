<?php

namespace Theme\Resido\Http\Controllers;

use App;
use BaseHelper;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Supports\RepositoryHelper;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Location\Repositories\Interfaces\CityInterface;
use Botble\Location\Repositories\Interfaces\StateInterface;
use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\RealEstate\Enums\PropertyTypeEnum;
use Botble\RealEstate\Models\Account;
use Botble\RealEstate\Models\Property;
use Botble\RealEstate\Models\ReviewMeta;
use Botble\RealEstate\Repositories\Interfaces\AccountInterface;
use Botble\RealEstate\Repositories\Interfaces\CategoryInterface;
use Botble\RealEstate\Repositories\Interfaces\PropertyInterface;
use Botble\RealEstate\Repositories\Interfaces\ReviewInterface;
use Botble\RealEstate\Repositories\Interfaces\TypeInterface;
use Botble\Slug\Repositories\Interfaces\SlugInterface;
use Botble\Testimonial\Repositories\Interfaces\TestimonialInterface;
use Botble\Theme\Http\Controllers\PublicController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use SeoHelper;
use Theme;
use Theme\Resido\Http\Resources\CityResource;
use Theme\Resido\Http\Resources\PostResource;
use Theme\Resido\Http\Resources\PropertyHTMLResource;
use Theme\Resido\Http\Resources\PropertyResource;
use Theme\Resido\Http\Resources\ReviewResource;
use Theme\Resido\Http\Resources\TestimonialResource;
use App\Models\City;
use Botble\SeoHelper\SeoOpenGraph;

class ResidoController extends PublicController
{
    /**
     * @param string            $key
     * @param Request           $request
     * @param SlugInterface     $slugRepository
     * @param CityInterface     $cityRepository
     * @param PropertyInterface $propertyRepository
     * @param CategoryInterface $categoryRepository
     * @return \Response
     */
    public function getPropertiesByCity(
        string $key,
        Request $request,
        SlugInterface $slugRepository,
        CityInterface $cityRepository,
        PropertyInterface $propertyRepository,
        CategoryInterface $categoryRepository
    ) {
        $city = $cityRepository->getFirstBy([
            'slug' => $key,
        ]);

        if (! $city) {
            abort(404);
        }

        $filters = [
            'city_id' => $city->id,
        ];

        SeoHelper::setTitle(__('Properties in :city', ['city' => $city->name]));

        Theme::breadcrumb()
            ->add(__('Home'), route('public.index'))
            ->add(SeoHelper::getTitle(), $city->url);

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, CITY_MODULE_SCREEN_NAME, $city);

        $params = [
            'paginate' => [
                'per_page' => (int)theme_option('number_of_properties_per_page', 12),
                'current_paged' => (int)$request->input('page', 1),
            ],
            'order_by' => ['re_properties.created_at' => 'DESC'],
        ];

        $properties = $propertyRepository->getProperties($filters, $params);
        $categories = $categoryRepository->pluck('re_categories.name', 're_categories.id');

        return Theme::scope('real-estate.properties', compact('properties', 'categories'))
            ->render();
    }

    /**
     * @param string $slug
     * @param Request $request
     * @param ProjectInterface $projectRepository
     * @param CityInterface $cityRepository
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse|\Response
     */
    public function getProjectsByCity(
        string $slug,
        Request $request,
        ProjectInterface $projectRepository,
        CityInterface $cityRepository,
        BaseHttpResponse $response
    ) {
        $city = $cityRepository->getFirstBy(compact('slug'));

        if (! $city) {
            abort(404);
        }

        SeoHelper::setTitle(__('Projects in :city', ['city' => $city->name]));

        Theme::breadcrumb()
            ->add(__('Home'), route('public.index'))
            ->add(SeoHelper::getTitle(), route('public.project-by-city', $city->slug));

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, CITY_MODULE_SCREEN_NAME, $city);

        $perPage = (int)$request->input('per_page') ? (int)$request->input('per_page') : (int)theme_option(
            'number_of_projects_per_page',
            12
        );

        $filters = [
            'keyword' => $request->input('k'),
            'blocks' => $request->input('blocks'),
            'min_floor' => $request->input('min_floor'),
            'max_floor' => $request->input('max_floor'),
            'min_flat' => $request->input('min_flat'),
            'max_flat' => $request->input('max_flat'),
            'category_id' => $request->input('category_id'),
            'city' => $slug,
            'location' => $request->input('location'),
            'sort_by' => $request->input('sort_by'),
        ];

        $params = [
            'paginate' => [
                'per_page' => $perPage ?: 12,
                'current_paged' => (int)$request->input('page', 1),
            ],
            'order_by' => ['re_projects.created_at' => 'DESC'],
            'with' => RealEstateHelper::getProjectRelationsQuery(),
        ];

        $projects = $projectRepository->getProjects($filters, $params);

        if ($request->ajax()) {
            if ($request->input('minimal')) {
                return $response->setData(Theme::partial('search-suggestion', ['items' => $projects]));
            }

            return $response->setData(Theme::partial('real-estate.projects.items', ['projects' => $projects]));
        }

        $categories = get_property_categories([
            'indent' => '↳',
            'conditions' => ['status' => BaseStatusEnum::PUBLISHED],
        ]);

        return Theme::scope('real-estate.projects', compact('projects', 'categories'))
            ->render();
    }

    /**
     * @param Request          $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function ajaxGetProperties(Request $request, BaseHttpResponse $response)
    {
        if (! $request->ajax()) {
            abort(404);
        }

        $properties = [];
        $with = config('plugins.real-estate.real-estate.properties.relations');
        $withCount = [];
        if (is_review_enabled()) {
            $withCount = [
                'reviews',
                'reviews as reviews_avg' => function ($query) {
                    $query->select(DB::raw('avg(star)'));
                },
            ];
        }
        switch ($request->input('type')) {
            case 'related':
                $properties = app(PropertyInterface::class)
                    ->getRelatedProperties(
                        $request->input('property_id'),
                        (int)theme_option('number_of_related_properties', 8),
                        $with
                    );

                break;
            case 'rent':
                $properties = app(PropertyInterface::class)->getPropertiesByConditions(
                    [
                        're_properties.is_featured' => true,
                        're_properties.type' => PropertyTypeEnum::RENT,
                        're_properties.moderation_status' => ModerationStatusEnum::APPROVED,
                    ],
                    (int)theme_option('number_of_properties_for_rent', 8),
                    $with,
                    $withCount
                );

                break;

            case 'sale':
                $properties = app(PropertyInterface::class)->getPropertiesByConditions(
                    [
                        're_properties.is_featured' => true,
                        're_properties.type' => PropertyTypeEnum::SALE,
                        're_properties.moderation_status' => ModerationStatusEnum::APPROVED,
                    ],
                    (int)theme_option('number_of_properties_for_sale', 8),
                    $with,
                    $withCount
                );

                break;

            case 'recently-viewed-properties':
                $cookieName = App::getLocale() . '_recently_viewed_properties';
                $jsonRecentViewProduct = null;

                if (isset($_COOKIE[$cookieName])) {
                    $jsonRecentViewProduct = $_COOKIE[$cookieName];
                }

                if (! empty($jsonRecentViewProduct)) {
                    $ids = collect(json_decode($jsonRecentViewProduct, true))->flatten()->all();

                    $properties = app(PropertyInterface::class)->getPropertiesByConditions(
                        [
                            ['re_properties.id', 'IN', $ids],
                            're_properties.moderation_status' => ModerationStatusEnum::APPROVED,
                        ],
                        (int)theme_option('number_of_recently_viewed_properties', 3),
                        $with,
                        $withCount
                    );

                    $reversed = array_reverse($ids);

                    $properties = $properties->sortBy(function ($model) use ($reversed) {
                        return array_search($model->id, $reversed);
                    });
                }

                break;
        }

        return $response
            ->setData(PropertyHTMLResource::collection($properties))
            ->toApiResponse();
    }

    /**
     * @param Request          $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function ajaxGetPropertiesForMap(Request $request, BaseHttpResponse $response)
    {
        $params = [
            'with' => config('plugins.real-estate.real-estate.properties.relations'),
            'paginate' => [
                'per_page' => 20,
                'current_paged' => (int)$request->input('page', 1),
            ],
        ];

        $properties = app(PropertyInterface::class)->getProperties(['type' => $request->input('type')], $params);

        return $response
            ->setData(PropertyResource::collection($properties))
            ->toApiResponse();
    }

    /**
     * @param Request          $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse|RedirectResponse|JsonResource
     */
    public function ajaxGetPosts(Request $request, BaseHttpResponse $response)
    {
        if (! $request->ajax() || ! $request->wantsJson()) {
            abort(404);
        }

        $posts = app(PostInterface::class)->getFeatured(4, ['slugable', 'categories', 'categories.slugable']);

        return $response
            ->setData(PostResource::collection($posts))
            ->toApiResponse();
    }

    /**
     * @param Request          $request
     * @param AccountInterface $accountRepository
     * @return \Response
     */
    public function getAgents(string $city, Request $request, AccountInterface $accountRepository)
    {
        $city = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $city));
        $city = City::where('city_name', $city)->first();

        if (!$city) {
            abort(404, "City not found");
        }
        $accounts = $accountRepository->advancedGet([
            'paginate' => [
                'per_page' => 12,
                'current_paged' => (int)$request->input('page'),
            ],
            'condition' => ['city' => $city->id],
            'withCount' => [
                'properties' => function ($query) {
                    return RepositoryHelper::applyBeforeExecuteQuery($query, $query->getModel());
                },
            ],
        ]);

        SeoHelper::setTitle("Agents in ".$city->city_name." | Zameen Locator")
            ->setDescription("Discover real estate agents in $city. Connect with experts and view their profiles to assist you in buying or selling properties.");

        $meta = new SeoOpenGraph();
        // $meta->setImage(asset('assets/front/img/agent-list.jpg'));
        $meta->setDescription("Discover real estate agents in $city. Connect with experts and view their profiles to assist you in buying or selling properties.");
        $meta->setUrl(URL("agents/".$city->city_name));
        $meta->setTitle("Agents in ".$city->city_name." | Zameen Locator");
        $meta->setType('website');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()->add(__('Home'), route('public.index'))
        ->add(__('Agents in '. $city->city_name), route('public.agents', ['city' => $city->city_name]));

        return Theme::scope('real-estate.agents', compact('accounts', 'city'))->render();
    }

    /**
     * @param string            $username
     * @param Request           $request
     * @param AccountInterface  $accountRepository
     * @param PropertyInterface $propertyRepository
     * @return \Response
     */
    public function getAgent(
        string $id,
        Request $request,
        AccountInterface $accountRepository,
        PropertyInterface $propertyRepository
    ) {
        $account = $accountRepository->getFirstBy(['id' => $id]);

        if (! $account) {
            abort(404);
        }
        $city = City::where('id', $account->city)->first();

        SeoHelper::setTitle($account->name);

        $propertyTypes = app(TypeInterface::class)->all();
        $propertiesRelated = [];
        $totalProperties = 0;

        foreach ($propertyTypes as $propertyType) {
            $properties = $propertyRepository->advancedGet([
                'condition' => [
                    'author_id' => $account->id,
                    'author_type' => Account::class,
                    'type_id' => $propertyType->id,
                ],
                'paginate' => [
                    'per_page' => 12,
                    'current_paged' => (int)$request->input('page'),
                ],
                'with' => config('plugins.real-estate.real-estate.properties.relations'),
            ]);

            $propertiesRelated[] = [
                'type' => $propertyType,
                'properties' => $properties,
            ];

            $totalProperties += $properties->count();
        }

        $image1 = DB::table('zl_images')
        ->where(['location' => 'agent-detail1', 'status' => 1])
        ->first();

        Theme::breadcrumb()->add(__('Home'), route('public.index'))
        ->add(__($city->city_name))
        ->add(__($account->area));


        return Theme::scope('real-estate.agent', compact('propertiesRelated', 'totalProperties', 'account', 'city', 'image1'))
            ->render();
    }

    /**
     * @param Request          $request
     * @param CityInterface    $cityRepository
     * @param BaseHttpResponse $response
     * @return mixed
     */
    public function ajaxGetCities(Request $request, CityInterface $cityRepository, BaseHttpResponse $response)
    {
        if (! $request->ajax()) {
            abort(404);
        }

        $keyword = BaseHelper::stringify($request->input('q'));

        $cities = $cityRepository->filters($keyword, 10, [], ['cities.*']);

        return $response->setData(CityResource::collection($cities))->toApiResponse();
    }

    /**
     * @param Request $request
     * @return Response|\Response
     */
    public function getWishlist(Request $request, PropertyInterface $propertyRepository)
    {
        SeoHelper::setTitle(__('Wishlist'))
            ->setDescription(__('Wishlist'));

        $cookieName = App::getLocale() . '_wishlist';
        $jsonWishlist = null;
        if (isset($_COOKIE[$cookieName])) {
            $jsonWishlist = $_COOKIE[$cookieName];
        }

        $properties = collect([]);

        if (! empty($jsonWishlist)) {
            $arrValue = collect(json_decode($jsonWishlist, true))->flatten()->all();
            $properties = $propertyRepository->advancedGet([
                'condition' => [
                    ['re_properties.id', 'IN', $arrValue],
                ],
                'order_by' => [
                    're_properties.id' => 'DESC',
                ],
                'paginate' => [
                    'per_page' => (int)theme_option('number_of_properties_per_page', 12),
                    'current_paged' => (int)$request->input('page', 1),
                ],
                'with' => config('plugins.real-estate.real-estate.properties.relations'),
            ]);
        }

        Theme::breadcrumb()
            ->add(__('Home'), route('public.index'))
            ->add(__('Wishlist'));

        return Theme::scope('real-estate.wishlist', compact('properties'))->render();
    }

    /**
     * @param Request              $request
     * @param BaseHttpResponse     $response
     * @param TestimonialInterface $testimonialRepository
     * @return BaseHttpResponse
     */
    public function ajaxGetTestimonials(
        Request $request,
        BaseHttpResponse $response,
        TestimonialInterface $testimonialRepository
    ) {
        if (! $request->ajax() || ! $request->wantsJson()) {
            abort(404);
        }

        $testimonials = $testimonialRepository->allBy(['status' => BaseStatusEnum::PUBLISHED]);

        return $response->setData(TestimonialResource::collection($testimonials));
    }

    /**
     * @param Request          $request
     * @param BaseHttpResponse $response
     * @param ReviewInterface  $reviewRepository
     * @return BaseHttpResponse
     */
    public function ajaxGetRealEstateReviews(
        $id,
        Request $request,
        BaseHttpResponse $response,
        ReviewInterface $reviewRepository
    ) {
        $reviews = $reviewRepository->advancedGet([
            'condition' => [
                'status' => BaseStatusEnum::PUBLISHED,
                'reviewable_type' => $request->input('reviewable_type', Property::class),
                'reviewable_id' => $id,
            ],
            'order_by' => ['created_at' => 'desc'],
            'paginate' => [
                'per_page' => (int)$request->input('per_page', 10),
                'current_paged' => (int)$request->input('page', 1),
            ],
        ]);

        return $response->setData(ReviewResource::collection($reviews))->toApiResponse();
    }

    /**
     * @param Request          $request
     * @param BaseHttpResponse $response
     * @param ReviewInterface  $reviewRepository
     * @return BaseHttpResponse
     */
    public function ajaxGetRealEstateRating(
        $id,
        Request $request,
        BaseHttpResponse $response,
        PropertyInterface $propertyRepository
    ) {
        if (! $request->ajax() || ! $request->wantsJson()) {
            abort(404);
        }

        $property = $propertyRepository->getProperty($id);

        if (! $property->reviews_count) {
            return $response->setData([
                'message' => __('No review found'),
            ])->toApiResponse();
        }
        $service = ReviewMeta::whereHas('review', function (Builder $query) use ($request, $id) {
            $query->where([
                ['status', BaseStatusEnum::PUBLISHED],
                ['reviewable_type', $request->input('reviewable_type', Property::class)],
                ['reviewable_id', $id],
            ]);
        })->where('key', 'service')->select(DB::raw('avg(value) as avg'))->first();
        $value = ReviewMeta::whereHas('review', function (Builder $query) use ($request, $id) {
            $query->where([
                ['status', BaseStatusEnum::PUBLISHED],
                ['reviewable_type', $request->input('reviewable_type', Property::class)],
                ['reviewable_id', $id],
            ]);
        })->where('key', 'value')->select(DB::raw('avg(value) as avg'))->first();
        $location = ReviewMeta::whereHas('review', function (Builder $query) use ($request, $id) {
            $query->where([
                ['status', BaseStatusEnum::PUBLISHED],
                ['reviewable_type', $request->input('reviewable_type', Property::class)],
                ['reviewable_id', $id],
            ]);
        })->where('key', 'location')->select(DB::raw('avg(value) as avg'))->first();
        $cleanliness = ReviewMeta::whereHas('review', function (Builder $query) use ($request, $id) {
            $query->where([
                ['status', BaseStatusEnum::PUBLISHED],
                ['reviewable_type', $request->input('reviewable_type', Property::class)],
                ['reviewable_id', $id],
            ]);
        })->where('key', 'cleanliness')->select(DB::raw('avg(value) as avg'))->first();

        $dataRating = [
            'summary_avg' => [
                'cleanliness' => round($cleanliness->avg, 2),
                'location' => round($location->avg, 2),
                'service' => round($service->avg, 2),
                'value' => round($value->avg, 2),
            ],
            'star' => round($property->average_rating, 2),
        ];

        return $response->setData($dataRating)->toApiResponse();
    }

    /**
     * @param Request           $request
     * @param CategoryInterface $categoryRepository
     * @param BaseHttpResponse  $response
     * @return mixed
     */
    public function ajaxGetSubCategories(Request $request, CategoryInterface $categoryRepository, BaseHttpResponse $response)
    {
        if (! $request->ajax()) {
            abort(404);
        }

        $categories = $categoryRepository->allBy([
            'parent_id' => $request->input('id'),
        ]);

        return $response->setData($categories)->toApiResponse();
    }

    /**
     * @param Request          $request
     * @param StateInterface   $stateRepository
     * @param BaseHttpResponse $response
     * @return mixed
     */
    public function ajaxGetStatesByCountry(Request $request, StateInterface $stateRepository, BaseHttpResponse $response)
    {
        if (! $request->ajax()) {
            abort(404);
        }

        $states = $stateRepository->allBy([
            'country_id' => $request->input('id'),
        ]);

        return $response->setData($states)->toApiResponse();
    }

    /**
     * @param Request          $request
     * @param CityInterface    $cityRepository
     * @param BaseHttpResponse $response
     * @return mixed
     */
    public function ajaxGetCitiesByState(Request $request, CityInterface $cityRepository, BaseHttpResponse $response)
    {
        if (! $request->ajax()) {
            abort(404);
        }

        $cities = get_cities_by_state($request->input('id'));

        return $response->setData(CityResource::collection($cities))->toApiResponse();
    }
}
