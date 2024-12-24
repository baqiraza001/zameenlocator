@extends('admin.layouts.master')
@section('content')
<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-info" href="{{ route('admin.zameenlocator.advertisments.create') }}">Add New</a>
</div>
<div class="table-wrapper">
	<div class="table-responsive">
		<!-- Banners Table -->
		<h3 class="mb-3">Banners</h3>
		<table class="banners-table table table-striped table-bordered">
			<thead>
				<tr>
					<th>Banner ID</th>
					<th>Banner Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($banners as $banner)
				<tr>
					<td>{{ $banner->id }}</td>
					<td><img src="{{ asset(\App\Http\Controllers\AdvertismentController::ADVERTISMENT_BANNER_PATH . $banner->img) }}" alt="Banner" width="50"></td>
					<td>
						<button class="btn btn-danger btn-sm delete-banner" data-id="{{ $banner->id }}" data-type="1">
							<i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="3" class="text-center">No banners added yet</td>
				</tr>
				@endforelse
			</tbody>
		</table>

		<!-- Splash Banners Table -->
		<h3 class="mt-5 mb-3">Splash Banners</h3>
		<table class="splash-banners-table table table-striped table-bordered">
			<thead>
				<tr>
					<th>Splash Banner ID</th>
					<th>Splash Banner Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($splash_banners as $splash_banner)
				<tr>
					<td>{{ $splash_banner->id }}</td>
					<td><img src="{{ asset(\App\Http\Controllers\AdvertismentController::ADVERTISMENT_SPLASH_BANNER_PATH . $splash_banner->video) }}" alt="Splash Banner" width="50"></td>
					<td>
						<button class="btn btn-danger btn-sm delete-banner" data-id="{{ $splash_banner->id }}" data-type="2">
							<i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="3" class="text-center">No splash banners added yet</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

@push('header')
<link rel="stylesheet" href="{{ asset('/vendor/core/core/base/libraries/datatables/media/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/core/core/base/libraries/datatables/extensions/Buttons/css/buttons.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/core/core/base/libraries/datatables/extensions/Responsive/css/responsive.bootstrap.min.css') }}">
@endpush

@push('footer')
<script>
	$(document).ready(function() {
		$('.delete-banner').on('click', function() {
			var id = $(this).data('id');
			var type = $(this).data('type');
			if (confirm('Are you sure you want to delete this?')) {
				$.ajax({
					url: '{{ url('/') }}' + '/admin/zameenlocator/advertisments/delete/' + id + '/' + type,
					type: 'DELETE',
					data: {
						_token: '{{ csrf_token() }}'
					},
					success: function(response) {
						location.reload();
					},
					error: function(xhr) {
						alert('Error: ' + xhr.responseText);
					}
				});
			}
		});
	});
</script>
@endpush
@endsection
