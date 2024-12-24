<?php 
$menus = [
    [
        "id" => "cms-dashboard",
        "priority" => 0,
        "parent_id" => NULL,
        "name" => "Dashboard",
        "icon" => "fa fa-dashboard",
        "url" => route('admin.zameenlocator.dashboard'),
        "children" => [],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-society-maps-management",
        "priority" => 1,
        "parent_id" => NULL,
        "name" => "Maps Management",
        "icon" => "fa fa-map",
        "url" => "#",
        "children" => [
            [
                "id" => "society-maps-management-add-map",
                "priority" => 1,
                "parent_id" => "society-maps-management",
                "name" => "Add Map",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.society-maps.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "society-maps-management-list",
                "priority" => 2,
                "parent_id" => "society-maps-management",
                "name" => "Maps List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.society-maps.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-societies-management",
        "priority" => 2,
        "parent_id" => NULL,
        "name" => "Societies Management",
        "icon" => "fa fa-map-signs",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-societies-add-society",
                "priority" => 1,
                "parent_id" => "cms-societies-management",
                "name" => "Add Society",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.societies.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-societies-list",
                "priority" => 2,
                "parent_id" => "cms-societies-management",
                "name" => "Societies List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.societies.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-advertisments",
        "priority" => 3,
        "parent_id" => NULL,
        "name" => "Advertisment Ads",
        "icon" => "fa fa-user",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-advertisments-add-advertisment",
                "priority" => 1,
                "parent_id" => "cms-advertisments",
                "name" => "Add Advertisment",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.advertisments.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-advertisments-list",
                "priority" => 2,
                "parent_id" => "cms-advertisments",
                "name" => "Advertisments List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.advertisments.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-landing-slider",
        "priority" => 4,
        "parent_id" => NULL,
        "name" => "Landing Sliders",
        "icon" => "fa fa-map",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-landing-slider-add-landing-slider",
                "priority" => 1,
                "parent_id" => "cms-landing-slider",
                "name" => "Add Slider",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.landing-sliders.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-landing-slider-list",
                "priority" => 2,
                "parent_id" => "cms-landing-slider",
                "name" => "Landing Sliders",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.landing-sliders.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-download-maps",
        "priority" => 5,
        "parent_id" => NULL,
        "name" => "Download Maps",
        "icon" => "fa fa-download",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-download-maps-add-download-map",
                "priority" => 1,
                "parent_id" => "cms-download-maps",
                "name" => "Add Map",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.download-maps.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-download-maps-list",
                "priority" => 2,
                "parent_id" => "cms-download-maps",
                "name" => "Maps List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.download-maps.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-antique-maps",
        "priority" => 6,
        "parent_id" => NULL,
        "name" => "Antique Maps",
        "icon" => "fa fa-map",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-antique-maps-add-antique-map",
                "priority" => 1,
                "parent_id" => "cms-antique-maps",
                "name" => "Add Map",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.antique-maps.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-antique-maps-list",
                "priority" => 2,
                "parent_id" => "cms-antique-maps",
                "name" => "Maps List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.antique-maps.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-city-master-plan",
        "priority" => 7,
        "parent_id" => NULL,
        "name" => "City Master Plan",
        "icon" => "fa fa-map",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-city-master-plan-add-map",
                "priority" => 1,
                "parent_id" => "cms-city-master-plan",
                "name" => "Add Map",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.city-master-plan.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-city-master-plan-list",
                "priority" => 2,
                "parent_id" => "cms-city-master-plan",
                "name" => "Maps List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.city-master-plan.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-templates",
        "priority" => 8,
        "parent_id" => NULL,
        "name" => "Templates",
        "icon" => "fa fa-user",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-templates-add-map",
                "priority" => 1,
                "parent_id" => "cms-templates",
                "name" => "Add New",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.templates.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-templates-list",
                "priority" => 2,
                "parent_id" => "cms-templates",
                "name" => "Maps List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.templates.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-blogs",
        "priority" => 9,
        "parent_id" => NULL,
        "name" => "Blogs",
        "icon" => "fa fa-list",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-blogs-add-blog",
                "priority" => 1,
                "parent_id" => "cms-blogs",
                "name" => "Add Blog",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.blogs.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-blogs-list",
                "priority" => 2,
                "parent_id" => "cms-blogs",
                "name" => "Blogs List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.blogs.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-blogs-categories",
        "priority" => 10,
        "parent_id" => NULL,
        "name" => "Blog Categories",
        "icon" => "fa fa-list",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-blogs-categories-add-category",
                "priority" => 1,
                "parent_id" => "cms-blogs-categories",
                "name" => "Add Category",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.blogs-categories.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-blogs-categories-list",
                "priority" => 2,
                "parent_id" => "cms-blogs-categories",
                "name" => "Categories List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.blogs-categories.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-islamic",
        "priority" => 11,
        "parent_id" => NULL,
        "name" => "Ayat & Hadees",
        "icon" => "fa fa-map",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-islamic-add-haees",
                "priority" => 1,
                "parent_id" => "cms-islamic",
                "name" => "Add Hadees",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.islamic.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-islamic-list",
                "priority" => 2,
                "parent_id" => "cms-islamic",
                "name" => "Ahadees List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.islamic.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-maps",
        "priority" => 12,
        "parent_id" => NULL,
        "name" => "Maps",
        "icon" => "fa fa-map",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-maps-add-map",
                "priority" => 1,
                "parent_id" => "cms-maps",
                "name" => "Add Map",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.maps.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-maps-list",
                "priority" => 2,
                "parent_id" => "cms-maps",
                "name" => "Maps List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.maps.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-countries-maps",
        "priority" => 13,
        "parent_id" => NULL,
        "name" => "Country Maps",
        "icon" => "fa fa-map",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-countries-maps-add-map",
                "priority" => 1,
                "parent_id" => "cms-countries-maps",
                "name" => "Add Map",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.countries-maps.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-countries-maps-list",
                "priority" => 2,
                "parent_id" => "cms-countries-maps",
                "name" => "Maps List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.countries-maps.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-countries",
        "priority" => 14,
        "parent_id" => NULL,
        "name" => "Countries",
        "icon" => "fa fa-globe",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-countries-add",
                "priority" => 1,
                "parent_id" => "cms-countries",
                "name" => "Add Country",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.countries.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-countries-list",
                "priority" => 2,
                "parent_id" => "cms-countries",
                "name" => "Countries List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.countries.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-cities",
        "priority" => 15,
        "parent_id" => NULL,
        "name" => "Cities",
        "icon" => "fa fa-institution",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-cities-add",
                "priority" => 1,
                "parent_id" => "cms-cities",
                "name" => "Add City",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.cities.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-cities-list",
                "priority" => 2,
                "parent_id" => "cms-cities",
                "name" => "Cities List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.cities.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-districts",
        "priority" => 16,
        "parent_id" => NULL,
        "name" => "Districts",
        "icon" => "fa fa-globe",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-districts-add-district",
                "priority" => 1,
                "parent_id" => "cms-districts",
                "name" => "Add District",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.districts.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-districts-list",
                "priority" => 2,
                "parent_id" => "cms-districts",
                "name" => "Districts List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.districts.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-testimonial-sliders",
        "priority" => 17,
        "parent_id" => NULL,
        "name" => "Testimonial Slider",
        "icon" => "fa fa-sliders",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-testimonial-sliders-add-slider",
                "priority" => 1,
                "parent_id" => "cms-testimonial-sliders",
                "name" => "Add Slider",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.testimonial-sliders.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-testimonial-sliders-list",
                "priority" => 2,
                "parent_id" => "cms-testimonial-sliders",
                "name" => "Sliders List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.testimonial-sliders.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    /*[
        "id" => "cms-agents",
        "priority" => 18,
        "parent_id" => NULL,
        "name" => "Agents",
        "icon" => "fa fa-users",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-agents-add-slider",
                "priority" => 1,
                "parent_id" => "cms-agents",
                "name" => "Add Agent",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.agents.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-agents-list",
                "priority" => 2,
                "parent_id" => "cms-agents",
                "name" => "Agents List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.agents.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],*/
    [
        "id" => "cms-diaries",
        "priority" => 19,
        "parent_id" => NULL,
        "name" => "Property Diary",
        "icon" => "fa fa-institution",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-diaries-add-diary",
                "priority" => 1,
                "parent_id" => "cms-diaries",
                "name" => "Add Diary",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.diaries.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-diaries-list",
                "priority" => 2,
                "parent_id" => "cms-diaries",
                "name" => "Diaries List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.diaries.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-tour-guides",
        "priority" => 20,
        "parent_id" => NULL,
        "name" => "Tour Guides",
        "icon" => "fa fa-institution",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-tour-guides-add-tour-guide",
                "priority" => 1,
                "parent_id" => "cms-tour-guides",
                "name" => "Add Tour Guide",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.tour-guides.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-tour-guides-list",
                "priority" => 2,
                "parent_id" => "cms-tour-guides",
                "name" => "Tour Guides List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.tour-guides.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-popups",
        "priority" => 21,
        "parent_id" => NULL,
        "name" => "Index Popup",
        "icon" => "fa fa-bullhorn",
        "url" => "#",
        "children" => [
            [
                "id" => "cms-popups-add-popup",
                "priority" => 1,
                "parent_id" => "cms-popups",
                "name" => "Add News",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.popups.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-popups-list",
                "priority" => 2,
                "parent_id" => "cms-popups",
                "name" => "News List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.popups.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]
        ],
        "permissions" => [],
        "active" => false
    ],
    [
        "id" => "cms-home-images",
        "priority" => 22,
        "parent_id" => NULL,
        "name" => "Images",
        "icon" => "fa fa-sliders",
        "url" => route('admin.zameenlocator.home-images.index'),
        "children" => [
            /*[
                "id" => "cms-home-images-add-image",
                "priority" => 1,
                "parent_id" => "cms-home-images",
                "name" => "Add Image",
                "icon" => "fa fa-plus",
                "url" => route('admin.zameenlocator.home-images.create'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ],
            [
                "id" => "cms-home-images-list",
                "priority" => 2,
                "parent_id" => "cms-home-images",
                "name" => "Images List",
                "icon" => "fa fa-reorder",
                "url" => route('admin.zameenlocator.home-images.index'),
                "children" => [],
                "permissions" => [],
                "active" => false
            ]*/
        ],
        "permissions" => [],
        "active" => false
    ],
    /*[
        "id" => "cms-website-settings",
        "priority" => 23,
        "parent_id" => NULL,
        "name" => "General Settings",
        "icon" => "fa fa-cogs",
        "url" => route('admin.zameenlocator.website-settings.edit'),
        "children" => [],
        "permissions" => [],
        "active" => false
    ],*/
]; 
?>

<?php
$currentUrl = URL::full();

function isActiveMenu($menu, $currentUrl)
{
    // Check if the current URL starts with the main menu URL
    if (strpos($currentUrl, $menu['url']) === 0) {
        return true;
    }

    // Check if any child menu URL starts with the current URL
    if (isset($menu['children'])) {
        foreach ($menu['children'] as $child) {
            if (strpos($currentUrl, $child['url']) === 0) {
                return true;
            }
        }
    }

    return false;
}
?>


<li class="nav-item" id="cms-core-dashboard">
    <a href="{{ route('dashboard.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-dashboard"></i>
        <span class="title">Property Dashboard</span>
    </a>
</li>

@foreach ($menus as $menu)
@php
    $isActive = isActiveMenu($menu, $currentUrl); // Check if the menu or its children are active
@endphp
<li class="nav-item @if ($isActive) active @endif" id="{{ $menu['id'] }}">
    <a href="{{ $menu['url'] }}" class="nav-link nav-toggle">
        <i class="{{ $menu['icon'] }}"></i>
        <span class="title">
            {{ !is_array(trans($menu['name'])) ? trans($menu['name']) : null }}
        {!! apply_filters(BASE_FILTER_APPEND_MENU_NAME, null, $menu['id']) !!}</span>
        @if (isset($menu['children']) && count($menu['children'])) <span class="arrow @if ($isActive) open @endif"></span> @endif
    </a>
    @if (isset($menu['children']) && count($menu['children']))
    <ul class="sub-menu @if (!$isActive) hidden-ul @endif">
        @foreach ($menu['children'] as $item)
        <li class="nav-item @if ($item['url'] == $currentUrl) active @endif" id="{{ $item['id'] }}">
            <a href="{{ $item['url'] }}" class="nav-link">
                <i class="{{ $item['icon'] }}"></i>
                {{ trans($item['name']) }}
                {!! apply_filters(BASE_FILTER_APPEND_MENU_NAME, null, $item['id']) !!}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</li>
@endforeach
