<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\City;
use App\Models\District;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertismentController extends BaseController
{
    public const ADVERTISMENT_BANNER_PATH = 'maps_images/';
    public const ADVERTISMENT_SPLASH_BANNER_PATH = 'maps_images/';

    public function index()
    {
        PageTitle::setTitle('Advertisments');

        $banners = DB::table('zl_ads')->get();
        $splash_banners = DB::table('zl_video')->get();

        return view('admin.advertisments.index', compact('banners', 'splash_banners'));
    }


    public function create()
    {
        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Advertisments / Add Advertisment');

        $cities = City::all();
        $districts = District::all();

        return view('admin.advertisments.create', compact('cities', 'districts'));
    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        if ($request->hasFile('banner')) {
            $bannerFile = $request->file('banner');
            $bannerFileName = $bannerFile->getClientOriginalName();
            $bannerFileName = time()."-".str_replace(' ','',$bannerFileName);
            $bannerFile->move(public_path(self::ADVERTISMENT_BANNER_PATH), $bannerFileName);

            DB::table('zl_ads')->insert([
                'img' => $bannerFileName,
            ]);
        }

        if ($request->hasFile('splash_banner')) {
            $splashBannerFile = $request->file('splash_banner');
            $splashBannerFileName = $splashBannerFile->getClientOriginalName();
            $splashBannerFileName = time()."-".str_replace(' ','',$splashBannerFileName);
            $splashBannerFile->move(public_path(self::ADVERTISMENT_SPLASH_BANNER_PATH), $splashBannerFileName);

            DB::table('zl_video')->insert([
                'video' => $splashBannerFileName,
            ]);
        }

        return $response
        ->setNextUrl(route('admin.zameenlocator.advertisments.index'))
        ->setMessage('Uploaded successfully');
    }




    public function edit($id)
    {
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
    }

    public function destroy($id, $type = 1, Request $request, BaseHttpResponse $response)
    {
        try {
            if ($type == 1) {
                $ad = DB::table('zl_ads')->where('id', $id)->first();
                if ($ad && $ad->img) {
                    $existingBannerFile = public_path(self::ADVERTISMENT_BANNER_PATH . $ad->img);
                    if (file_exists($existingBannerFile)) {
                        unlink($existingBannerFile);
                    }
                }
                DB::table('zl_ads')->where('id', $id)->delete();
            } elseif ($type == 2) {
                $video = DB::table('zl_video')->where('id', $id)->first();
                if ($video && $video->video) {
                    $existingSplashBannerFile = public_path(self::ADVERTISMENT_SPLASH_BANNER_PATH . $video->video);
                    if (file_exists($existingSplashBannerFile)) {
                        unlink($existingSplashBannerFile);
                    }
                }
                DB::table('zl_video')->where('id', $id)->delete();
            }

            return $response
            ->setNextUrl(route('admin.zameenlocator.advertisments.index'))
            ->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
