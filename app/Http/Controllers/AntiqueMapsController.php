<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\AntiqueMap;
use App\Models\City;
use App\Models\District;
use App\Tables\AntiqueMapsTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AntiqueMapsController extends BaseController
{
    public function index(AntiqueMapsTable $dataTable)
    {
        PageTitle::setTitle('Antique Maps');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $antiqueMap = new AntiqueMap();
    
        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Antique Maps / Add Antique Map');

        return view('admin.antique-maps.create', compact('antiqueMap'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $antiqueMap = new AntiqueMap();

        $antiqueMap->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.antique-maps.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $antiqueMap = AntiqueMap::findOrFail($id);

        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Antique Maps / Edit Antique Map');

        return view('admin.antique-maps.edit', compact('antiqueMap'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $antiqueMap = AntiqueMap::findOrFail($id);
        $antiqueMap->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.antique-maps.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $antiqueMap = AntiqueMap::findOrFail($id);

            $existingFile = public_path(AntiqueMap::ANTIQUE_MAPS_PATH.$antiqueMap->img);
            if (file_exists($existingFile))
                unlink($existingFile);

            $antiqueMap->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
