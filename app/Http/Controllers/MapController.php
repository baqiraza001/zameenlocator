<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\Map;
use App\Tables\MapTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapController extends BaseController
{
    public function index(MapTable $dataTable)
    {
        PageTitle::setTitle('Maps');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $map = new Map();

        PageTitle::setTitle('Maps / Add Map');

        return view('admin.maps.create', compact('map'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $map = new Map();

        $map->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.maps.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $map = Map::findOrFail($id);

        PageTitle::setTitle('Maps / Edit Map');

        return view('admin.maps.edit', compact('map'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $map = Map::findOrFail($id);
        $map->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.maps.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $map = Map::findOrFail($id);

            $existingFile = public_path(Map::MAP_IMAGES_PATH.$map->img);
            if (file_exists($existingFile))
                unlink($existingFile);

            $map->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
