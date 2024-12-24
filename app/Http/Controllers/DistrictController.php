<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\District;
use App\Tables\DistrictTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistrictController extends BaseController
{
    public function index(DistrictTable $dataTable)
    {
        PageTitle::setTitle('Districts');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $district = new District();
        PageTitle::setTitle('Districts / Add District');

        return view('admin.districts.create', compact('district'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $district = new District();

        $district->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.districts.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $district = District::findOrFail($id);
        PageTitle::setTitle('Districts / Edit District');

        return view('admin.districts.edit', compact('district'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $district = District::findOrFail($id);
        $district->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.districts.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $district = District::findOrFail($id);

            $district->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
