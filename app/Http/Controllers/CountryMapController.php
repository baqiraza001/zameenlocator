<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\CountryMap;
use App\Tables\CountryMapTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryMapController extends BaseController
{
    public function index(CountryMapTable $dataTable)
    {
        PageTitle::setTitle('Country Maps');

        return $dataTable->renderTable();
    }

    public function create()
    {
        $countryMap = new CountryMap();

        PageTitle::setTitle('Country Maps / Add Country Map');

        return view('admin.countries-maps.create', compact('countryMap'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $countryMap = new CountryMap();
        $countryMap->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.countries-maps.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $countryMap = CountryMap::findOrFail($id);

        PageTitle::setTitle('Country Maps / Edit Country Map');

        return view('admin.countries-maps.edit', compact('countryMap'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $countryMap = CountryMap::findOrFail($id);
        $countryMap->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.countries-maps.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $countryMap = CountryMap::findOrFail($id);

            $existingFile = public_path(CountryMap::COUNTRY_MAP_FLAG_IMAGES_PATH.$countryMap->flag);
            if (file_exists($existingFile))
                unlink($existingFile);

            $existingFile = public_path(CountryMap::COUNTRY_MAP_MAP_IMAGES_PATH.$countryMap->map);
            if (file_exists($existingFile))
                unlink($existingFile);
            
            $countryMap->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
