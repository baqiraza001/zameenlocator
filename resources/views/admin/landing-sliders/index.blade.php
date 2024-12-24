@extends('admin.layouts.master')
@section('content')
<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-info" href="{{ route('admin.zameenlocator.landing-sliders.create') }}">Add New</a>
</div>
<div class="table-wrapper">
	<div class="table-responsive">
		<h3 class="mt-5 mb-3">Landing Sliders</h3>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Image 1</th>
					<th>Image 2</th>
					<th>Image 3</th>
					<th>Image 4</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($landing_sliders as $index => $landing_slider)
				<tr>
					<td>{{ $index + 1 }}</td>
					
					@for ($i = 1; $i <= 4; $i++)
						@php
							$imageField = "image_$i";
						@endphp
						<td>
							@if (!empty($landing_slider->$imageField))
								<img src="{{ asset(\App\Http\Controllers\LandingSliderController::LANDING_SLIDER_IMAGES_PATH . $landing_slider->$imageField) }}" style="width:150px; height:50px; object-fit:contain;">
							@endif
						</td>
					@endfor

					<td>
						<button class="btn btn-danger btn-sm delete-banner" data-id="{{ $landing_slider->id }}">
							<i class="fa fa-trash" style="font-size: 30px;"></i>
						</button>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="6" class="text-center">No landing sliders added yet</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

@push('footer')
<script>
	$(document).ready(function() {
		$('.delete-banner').on('click', function() {
			var id = $(this).data('id');
			if (confirm('Are you sure you want to delete this?')) {
				$.ajax({
					url: '{{ url('/') }}' + '/admin/zameenlocator/landing-sliders/delete/' + id,
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
