@extends('admin.layouts.master')
<style type="text/css">
	.dashboard-stat .visual>i {
		line-height: 50px !important;
		margin-left: 0px !important;
		opacity: 0.2;
	}
	.dashboard-stat .details .desc {
		font-size: 20px !important;
	}
</style>
@section('content')
<div class="row">
	<div class="col">
		<a class="dashboard-stat dashboard-stat-v2 text-white bg-primary" href="#">
			<div class="visual">
				<i class="fa fa-city"></i>
			</div>
			<div class="details">
				<div class="number">
					<?php $totalCities = \DB::table('zl_cities')->count(); ?>
					<span data-counter="counterup" data-value="{{ $totalCities }}">0</span>
				</div>
				<div class="desc">Total Cities</div>
			</div>
		</a>
	</div>

	<div class="col">
		<a class="dashboard-stat dashboard-stat-v2 text-white bg-success" href="#">
			<div class="visual">
				<i class="fa fa-map"></i>
			</div>
			<div class="details">
				<div class="number">
					<?php $totalMaps = \DB::table('zl_g_maps')->count(); ?>
					<span data-counter="counterup" data-value="{{ $totalMaps }}">0</span>
				</div>
				<div class="desc">Total Maps</div>
			</div>
		</a>
	</div>

	<div class="col">
		<a class="dashboard-stat dashboard-stat-v2 text-white bg-danger" href="#">
			<div class="visual">
				<i class="fa fa-exclamation-triangle"></i>
			</div>
			<div class="details">
				<div class="number">
					<?php $totalIllegalSocieties = \DB::table('zl_socities_l_i')->where('status', 0)->count(); ?>
					<span data-counter="counterup" data-value="{{ $totalIllegalSocieties }}">0</span>
				</div>
				<div class="desc">Illegal Societies</div>
			</div>
		</a>
	</div>

	<div class="col">
		<a class="dashboard-stat dashboard-stat-v2 text-white bg-dark" href="#">
			<div class="visual">
				<i class="fa fa-check-circle"></i>
			</div>
			<div class="details">
				<div class="number">
					<?php $totalLegalSocieties = \DB::table('zl_socities_l_i')->where('status', 1)->count(); ?>
					<span data-counter="counterup" data-value="{{ $totalLegalSocieties }}">0</span>
				</div>
				<div class="desc">Legal Societies</div>
			</div>
		</a>
	</div>
</div>
@endsection
