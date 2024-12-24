<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\TourGuide;
use App\Models\City;
use App\Models\Country;
use App\Tables\TourGuideTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourGuideController extends BaseController
{
    public function index(TourGuideTable $dataTable)
    {
        PageTitle::setTitle('Tour Guides');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $tourGuide = new TourGuide();

        PageTitle::setTitle('Tour Guides / Add Tour Guide');

        $countries = Country::all();

        return view('admin.tour-guides.create', compact('tourGuide', 'countries'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $tourGuide = new TourGuide();

        $tourGuide->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.tour-guides.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $tourGuide = TourGuide::with('cityRelation')->findOrFail($id);
        PageTitle::setTitle('Tour Guides / Edit Tour Guide');

        $countries = Country::all();

        return view('admin.tour-guides.edit', compact('tourGuide', 'countries'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $tourGuide = TourGuide::findOrFail($id);
        $tourGuide->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.tour-guides.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $tourGuide = TourGuide::findOrFail($id);

            $existingFile = public_path(TourGuide::TOUR_GUIDE_IMAGES_PATH.$tourGuide->image);
            if (file_exists($existingFile))
                unlink($existingFile);

            $tourGuide->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }

    public function getCity(Request $request)
    {
        $countryId = $request->input('id');
        $cities = City::where('country', $countryId)->get();

        $cityOptions = '<option value="">Select City</option>';
        foreach ($cities as $city) {
            $cityOptions .= '<option value="' . $city->id . '">' . $city->city_name . '</option>';
        }

        return response()->json($cityOptions);
    }
}
