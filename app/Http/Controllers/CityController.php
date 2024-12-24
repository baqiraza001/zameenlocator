<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\City;
use App\Models\Country;
use App\Tables\CityTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends BaseController
{
    public function index(CityTable $dataTable)
    {
        PageTitle::setTitle('Cities');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $city = new City();
        PageTitle::setTitle('Cities / Add City');

        $countries = Country::all();

        return view('admin.cities.create', compact('city', 'countries'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $city = new City();

        $city->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.cities.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        PageTitle::setTitle('Cities / Edit City');

        $countries = Country::all();

        return view('admin.cities.edit', compact('city', 'countries'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $city = City::findOrFail($id);
        $city->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.cities.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $city = City::findOrFail($id);

            $existingFile = public_path(City::CITY_IMAGES_PATH.$city->city_image);
            if (file_exists($existingFile))
                unlink($existingFile);

            $city->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
