<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\SocietyMap;
use App\Models\City;
use App\Models\District;
use App\Tables\SocietyMapsTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocietyMapsController extends BaseController
{
    public function index(SocietyMapsTable $dataTable)
    {
        PageTitle::setTitle('Society Maps');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $societyMap = new SocietyMap();
    
        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Society Maps / Add Society Map');

        $cities = City::all();
        $districts = District::all();

        return view('admin.society-maps.create', compact('societyMap', 'cities', 'districts'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $societyMap = new SocietyMap();
        $societyMap->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.society-maps.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $societyMap = SocietyMap::findOrFail($id);

        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Society Maps / Edit Society Map');

        $cities = City::all();
        $districts = District::all();

        return view('admin.society-maps.edit', compact('societyMap', 'cities', 'districts'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $societyMap = SocietyMap::findOrFail($id);
        $societyMap->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.society-maps.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $societyMap = SocietyMap::findOrFail($id);

            $existingFile = public_path(SocietyMap::SOCIETY_MAPS_PATH.$societyMap->banner);
            if (file_exists($existingFile))
                unlink($existingFile);

            $existingFile = public_path(SocietyMap::SOCIETY_MAPS_PATH.$societyMap->master_plan);
            if (file_exists($existingFile))
                unlink($existingFile);
            
            $societyMap->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
