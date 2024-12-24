<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\BlogCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        add_shortcode(
            'zameenlocator-maps-list',
            __('Latest Maps'),
            __('Latest Maps'),
            function ($shortcode) {
                $title = 'Latest Maps';
                $description = $shortcode->content;
                return view('admin.shortcodes.maps-list', compact('title', 'description'));
            }
        );

        add_shortcode(
            'zameenlocator-explore-more-home-page',
            __('Explore More Home Page'),
            __('Explore More Home Page'),
            function ($shortcode) {
                $title = 'Explore more on Zameen Locator';
                $description = $shortcode->content;
                return view('admin.shortcodes.explore-more-home-page', compact('title', 'description'));
            }
        );

        add_shortcode(
            'zameenlocator-blog-categories',
            __('Zameen Locator Blogs Categories'),
            __('Zameen Locator Blogs Categories'),
            function ($shortcode) {
                $title = 'Blogs Categories';
                $description = $shortcode->content;
                
                $categories = BlogCategory::all();
                
                return view('admin.shortcodes.blog-categories', compact('title', 'description', 'categories'));
            }
        );
    }

}
