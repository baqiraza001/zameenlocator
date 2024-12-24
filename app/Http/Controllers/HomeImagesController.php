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

class HomeImagesController extends BaseController
{
    public const HOME_IMAGES_PATH = 'front/img/';

    public function index()
    {
        PageTitle::setTitle('Images');

        $images = DB::table('zl_images')->get();
        return view('admin.home-images.index', compact('images'));
    }


    public function create()
    {
        PageTitle::setTitle('Images / Add Image');

        return view('admin.home-images.create');
    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        if ($request->hasFile('img')) {
            $imgFile = $request->file('img');
            $imgFileName = time() . '_' . $imgFile->getClientOriginalName();
            $imgFile->move(public_path(self::HOME_IMAGES_PATH), $imgFileName);

            DB::table('zl_images')->insert([
                'img' => $imgFileName,
                'location' => '',
                'status' => 0
            ]);
        }
        return $response
        ->setNextUrl(route('admin.zameenlocator.home-images.index'))
        ->setMessage('Uploaded successfully');
    }


    public function edit($id)
    {
        $homeImage = DB::table('zl_images')->where('id', $id)->first();
        return view('admin.home-images.edit', compact('homeImage'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $imgFileName = null;

        if ($request->hasFile('img')) {
            $imgFile = $request->file('img');
            $imgFileName = time() . '_' . $imgFile->getClientOriginalName();
            $imgFile->move(public_path(self::HOME_IMAGES_PATH), $imgFileName);

            $oldImage = DB::table('zl_images')->where('id', $id)->value('img');
            if ($oldImage && file_exists(public_path(self::HOME_IMAGES_PATH) . '/' . $oldImage)) {
                unlink(public_path(self::HOME_IMAGES_PATH) . '/' . $oldImage);
            }
        }

        if(!empty($imgFileName))
        {
            DB::table('zl_images')->where('id', $id)->update([
                'img' => $imgFileName
            ]);
        }

        return $response
        ->setNextUrl(route('admin.zameenlocator.home-images.index'))
        ->setMessage('Updated successfully');
    }


    public function destroy($id, $type = 1, Request $request, BaseHttpResponse $response)
    {
        try {
            $homeImage = DB::table('zl_images')->where('id', $id)->first();
            if ($homeImage && $homeImage->img) {
                $existingBannerFile = public_path(self::HOME_IMAGES_PATH . $homeImage->img);
                if (file_exists($existingBannerFile)) {
                    unlink($existingBannerFile);
                }
            }
            DB::table('zl_images')->where('id', $id)->delete();
            

            return $response
            ->setNextUrl(route('admin.zameenlocator.home-images.index'))
            ->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request, BaseHttpResponse $response)
    {
        $homeImage = DB::table('zl_images')->where('id', $id)->first();

        if ($request->has('approve')) {
            $homeImageStatus = 1;
        } elseif ($request->has('disapprove')) {
            $homeImageStatus = 0; 
        }

        DB::table('zl_images')->where('id', $id)->update([
            'status' => $homeImageStatus
        ]);

        return $response
        ->setNextUrl(route('admin.zameenlocator.home-images.index'))
        ->setMessage('Updated successfully');
    }
}
