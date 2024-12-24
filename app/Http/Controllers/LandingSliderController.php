<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingSliderController extends BaseController
{
    public const LANDING_SLIDER_IMAGES_PATH = 'landing_slider_images/';
    
    public function index()
    {
        PageTitle::setTitle('Landing Sliders');

        $landing_sliders = DB::table('zl_landing_sliders')->get();
        return view('admin.landing-sliders.index', compact('landing_sliders'));
    }


    public function create()
    {
        PageTitle::setTitle('Landing Sliders / Add Landing Slider');

        return view('admin.landing-sliders.create');

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $uploadedImages = [];

        for ($i = 1; $i <= 4; $i++) {
            $fieldName = 'img' . $i;

            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
                $fileName = $file->getClientOriginalName();
                $fileName = time()."-".str_replace(' ','',$fileName);
                $file->move(public_path(self::LANDING_SLIDER_IMAGES_PATH), $fileName);

                $uploadedImages["image_$i"] = $fileName;
            }
        }

        DB::table('zl_landing_sliders')->insert($uploadedImages);

        return $response
        ->setNextUrl(route('admin.zameenlocator.landing-sliders.index'))
        ->setMessage('Created successfully');
    }


    public function edit($id)
    {
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $ad = DB::table('zl_landing_sliders')->where('id', $id)->first();

            if ($ad) {
                for ($i = 1; $i <= 4; $i++) {
                    $imageField = "image_$i";
                    $filePath = public_path(self::LANDING_SLIDER_IMAGES_PATH . $ad->$imageField);

                    if (is_file($filePath) && file_exists($filePath)) {
                        unlink($filePath); 
                    }
                }

                DB::table('zl_landing_sliders')->where('id', $id)->delete();
            }

            return $response
            ->setNextUrl(route('admin.zameenlocator.landing-sliders.index'))
            ->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }

}
