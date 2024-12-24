<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\Country;
use App\Tables\CountryTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends BaseController
{
    public function index(CountryTable $dataTable)
    {
        PageTitle::setTitle('Countries');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $country = new Country();

        PageTitle::setTitle('Countries / Add Country');

        return view('admin.countries.create', compact('country'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $country = new Country();

        $country->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.countries.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);

        PageTitle::setTitle('Countries / Edit Country');

        return view('admin.countries.edit', compact('country'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $country = Country::findOrFail($id);
        $country->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.countries.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $country = Country::findOrFail($id);

            $existingFile = public_path(Country::COUNTRY_IMAGES_PATH.$country->image);
            if (file_exists($existingFile))
                unlink($existingFile);

            $country->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
