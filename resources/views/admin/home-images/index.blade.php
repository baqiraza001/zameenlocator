@extends('admin.layouts.master')
@section('content')
<!-- <div class="d-flex justify-content-end mb-3">
	<a class="btn btn-info" href="{{ route('admin.zameenlocator.home-images.create') }}">Add New</a>
</div> -->
<div class="table-wrapper">
	<div class="table-responsive">
		<!-- Images Table -->
		<h3 class="mb-3">Images</h3>
		<table class="images-table table table-striped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Location</th>
					<th>Image</th>
					<th>Publish/Unpublish</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($images as $image)
				<tr>
					<td>{{ $image->id }}</td>
					<td>{{ $image->location }}</td>
					<td><img src="{{ asset(\App\Http\Controllers\HomeImagesController::HOME_IMAGES_PATH . $image->img) }}" alt="Image" width="50"></td>
					<td>    
						<form method="post" action="{{ route('admin.zameenlocator.home-images.update-status', $image->id) }}">
							@csrf
							@method('PUT')
							@if($image->status == 0)
							<button type="submit" name="approve" class="btn btn-primary">Publish</button>
							@else
							<button type="submit" name="disapprove" class="btn btn-success">Unpublish</button>
							@endif
						</form>
					</td>
					<td>
						<a href="{{ route('admin.zameenlocator.home-images.edit', $image->id) }}" class="btn btn-primary btn-sm">
							<i class="fa fa-edit"></i> Edit
						</a>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="5" class="text-center">No images added yet</td>
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
		$('.delete-image').on('click', function() {
			var id = $(this).data('id');
			var type = $(this).data('type');
			if (confirm('Are you sure you want to delete this?')) {
				$.ajax({
					url: '{{ url('/') }}' + '/admin/zameenlocator/home-images/delete/' + id + '/' + type,
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
