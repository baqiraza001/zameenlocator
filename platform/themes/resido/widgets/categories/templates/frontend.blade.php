<!-- Categories -->
<div class="single-widgets widget_category">
	<h4 class="title">{{ $config['name'] }}</h4>
	<ul>
		@php
		$categories = \App\Models\BlogCategory::select('id', 'category')->get();
		@endphp

		@foreach ($categories as $category)
		<li>
			<?php 
			$slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($category->category)));
			?>
			<a href="{{ URL('blogs/'.$slug) }}" class="text-dark">
				{{ $category->category }}
			</a>
		</li>
		@endforeach
	</ul>
</div>
