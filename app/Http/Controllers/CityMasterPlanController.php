<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\CityMasterPlan;
use App\Models\City;
use App\Models\District;
use App\Tables\CityMasterPlanTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityMasterPlanController extends BaseController
{
    public function index(CityMasterPlanTable $dataTable)
    {
        PageTitle::setTitle('City Master Plan Maps');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $cityMasterPlan = new CityMasterPlan();
    
        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('City Master Plan Maps / Add City Master Plan Map');

        $cities = City::all();
        $districts = District::all();

        return view('admin.city-master-plan.create', compact('cityMasterPlan', 'cities', 'districts'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $cityMasterPlan = new CityMasterPlan();

        $cityMasterPlan->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.city-master-plan.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $cityMasterPlan = CityMasterPlan::findOrFail($id);

        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('City Master Plan Maps / Edit City Master Plan Map');

        $cities = City::all();
        $districts = District::all();

        return view('admin.city-master-plan.edit', compact('cityMasterPlan', 'cities', 'districts'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $cityMasterPlan = CityMasterPlan::findOrFail($id);
        $cityMasterPlan->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.city-master-plan.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $cityMasterPlan = CityMasterPlan::findOrFail($id);

            $existingFile = public_path(CityMasterPlan::CITY_MASTER_PLAN_IMAGES_PATH.$cityMasterPlan->img);
            if (file_exists($existingFile))
                unlink($existingFile);

            $cityMasterPlan->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
