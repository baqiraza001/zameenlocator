<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebsiteSettingController extends BaseController
{
    public function index()
    {
        PageTitle::setTitle('Website Settings');

        $websiteSetting = DB::table('zl_setting')->get();
        return view('admin.website-settings.index', compact('websiteSetting'));
    }


    public function create()
    {
        PageTitle::setTitle('Website Settings / Add Setting');

        return view('admin.website-settings.create');
    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        return $response
        ->setNextUrl(route('admin.zameenlocator.website-settings.index'))
        ->setMessage('Uploaded successfully');
    }
    public function edit()
    {
        PageTitle::setTitle('Website Settings / Update Setting');

        $websiteSetting = DB::table('zl_setting')->get()->toArray();
        $websiteSettingKeys = [];
        foreach ($websiteSetting as $setting) {
            $websiteSettingKeys[$setting->key] = $setting;
        }
        
        return view('admin.website-settings.edit', compact('websiteSetting', 'websiteSettingKeys'));
    }

    public function update(Request $request, BaseHttpResponse $response)
    {
        foreach ($request->except('_token') as $key => $value) {
            DB::table('zl_setting')
            ->where('key', $key)
            ->update(['value' => $value]);
        }

        return $response
        ->setNextUrl(route('admin.zameenlocator.website-settings.edit'))
        ->setMessage('Updated successfully');
    }


    public function destroy(Request $request, BaseHttpResponse $response)
    {
        try {
            return $response
            ->setNextUrl(route('admin.zameenlocator.website-settings.index'))
            ->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
