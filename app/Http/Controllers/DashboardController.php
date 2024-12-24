<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Botble\Base\Facades\Assets;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Facades\PageTitle;

class DashboardController extends BaseController
{
	public function index()
	{
		PageTitle::setTitle(trans('core/dashboard::dashboard.title'));
		
		Assets::addScripts(['blockui', 'sortable', 'equal-height', 'counterup'])
		->addScriptsDirectly('vendor/core/core/dashboard/js/dashboard.js')
		->addStylesDirectly('vendor/core/core/dashboard/css/dashboard.css');

		Assets::usingVueJS();

		return view('admin.dashboard.index');
	}
}
