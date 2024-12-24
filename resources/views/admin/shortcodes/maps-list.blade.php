<section>
    <div class="container list">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>{!! clean($title) !!}</h2>
                    <p>{!! clean($description) !!}</p>
                </div>
            </div>
        </div>
        <div id="map-list">
            <div class="row" id="map-items"></div>
            <div class="row"><div class="col-lg-12 col-md-12 col-sm-12 text-center"><a href="http://127.0.0.1:8000/properties" class="btn btn-theme-light-2 rounded">View All Maps</a></div></div>
            <div class="row">
                <div class="col-12 text-center">
                    <div id="pagination-links"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<component is="script" type="text/javascript">
    const API_URL = "{{ url('/api/maps') }}";

// Fetch initial data
fetchMaps(1); // Fetch first page by default

// Handle pagination click
$(document).on('click', '#pagination-links a', function (e) {
    e.preventDefault();
    const page = $(this).data('page'); // Retrieve the page number
    fetchMaps(page);
});

function renderMaps(maps) {
    const container = $('#map-items');
    container.html(''); // Clear existing items

    if (maps.length === 0) {
        return;
    }

    maps.forEach(map => {
        const slug = map.society_map_name.replace(/[^a-zA-Z0-9-]+/g, '').toLowerCase();
        const html = `
            <div class="col-lg-4 col-md-4">
                <div class="location-property-wrap">
                    <div class="location-property-thumb">
                        <a href="/map/${map.id}/${slug}">
                            <img src="{{ asset(App\Models\SocietyMap::SOCIETY_MAPS_PATH) }}/${map.master_plan}" 
                                 class="w-100 lazy"
                                 alt="${map.society_map_name}">
                        </a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title">${map.society_map_name}</h4>
                        </div>
                        <div class="lp-content-right">
                            <a href="/map/${map.id}/${slug}" class="lp-property-view">
                                <i class="ti-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `;
        container.append(html);
    });
}


function fetchMaps(page = 1) {
    $.ajax({
        url: `${API_URL}/${page}`,
        type: 'GET',
        beforeSend: function () {
            $('#map-items').html('<p class="text-center"><div class="half-circle-spinner loading-spinner"><div class="circle circle-1"></div><div class="circle circle-2"></div></div></p>'); // Show loading state
        },
        success: function (response) {
            if (response.success) {
                renderMaps(response.data);
                renderPagination(response.current_page, response.last_page);
            } else {
                // $('#map-items').html('<p class="text-center">Failed to load maps.</p>');
            }
        },
        error: function () {
            // $('#map-items').html('<p class="text-center">An error occurred while fetching data.</p>');
        }
    });
}

function renderPagination(currentPage, lastPage) {
    const paginationContainer = $('#pagination-links');
    paginationContainer.html(''); // Clear existing pagination

    let paginationHtml = `<nav><ul class="pagination justify-content-center">`;

    // Previous Button
    if (currentPage > 1) {
        paginationHtml += `
            <li class="page-item">
                <a href="javascript:void(0)" class="page-link" data-page="${currentPage - 1}"><i class="fa fa-chevron-left"></i></a>
            </li>`;
    } else {
        paginationHtml += `
            <li class="page-item disabled">
                <span class="page-link"><i class="fa fa-chevron-left"></i></span>
            </li>`;
    }

    // Page Numbers
    for (let i = 1; i <= lastPage; i++) {
        paginationHtml += `
            <li class="page-item ${i === currentPage ? 'active' : ''}">
                <a href="javascript:void(0)" class="page-link" data-page="${i}">${i}</a>
            </li>`;
    }

    // Next Button
    if (currentPage < lastPage) {
        paginationHtml += `
            <li class="page-item">
                <a href="javascript:void(0)" class="page-link" data-page="${currentPage + 1}"><i class="fa fa-chevron-right"></i></a>
            </li>`;
    } else {
        paginationHtml += `
            <li class="page-item disabled">
                <span class="page-link"><i class="fa fa-chevron-right"></i></span>
            </li>`;
    }

    paginationHtml += `</ul></nav>`;
    paginationContainer.html(paginationHtml);
}



</component>