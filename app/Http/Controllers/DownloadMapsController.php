<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\DownloadMap;
use App\Models\City;
use App\Models\District;
use App\Tables\DownloadMapsTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadMapsController extends BaseController
{
    public function index(DownloadMapsTable $dataTable)
    {
        PageTitle::setTitle('Download Maps');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $downloadMap = new DownloadMap();
    
        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Download Maps / Add Download Map');

        $cities = City::all();
        $districts = District::all();

        return view('admin.download-maps.create', compact('downloadMap', 'cities', 'districts'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $downloadMap = new DownloadMap();

        $downloadMap->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.download-maps.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $downloadMap = DownloadMap::findOrFail($id);

        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Download Maps / Edit Download Map');

        $cities = City::all();
        $districts = District::all();

        return view('admin.download-maps.edit', compact('downloadMap', 'cities', 'districts'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $downloadMap = DownloadMap::findOrFail($id);
        $downloadMap->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.download-maps.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $downloadMap = DownloadMap::findOrFail($id);

            $existingFile = public_path(DownloadMap::DOWNLOAD_MAPS_PATH.$downloadMap->img);
            if (file_exists($existingFile))
                unlink($existingFile);

            $downloadMap->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
