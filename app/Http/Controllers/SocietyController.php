<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\Society;
use App\Models\City;
use App\Models\District;
use App\Tables\SocietyTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocietyController extends BaseController
{
    public function index(SocietyTable $dataTable)
    {
        PageTitle::setTitle('Societies');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $society = new Society();

        PageTitle::setTitle('Societies / Add Society');

        $cities = City::all();
        $districts = District::all();

        return view('admin.societies.create', compact('society', 'cities', 'districts'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $society = new Society();
        $society->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.societies.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $society = Society::findOrFail($id);

        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Societies / Edit Society');

        $cities = City::all();
        $districts = District::all();

        return view('admin.societies.edit', compact('society', 'cities', 'districts'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $society = Society::findOrFail($id);
        $society->update($request->all());

        return $response
        ->setNextUrl(route('admin.zameenlocator.societies.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $society = Society::findOrFail($id);
            $society->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
