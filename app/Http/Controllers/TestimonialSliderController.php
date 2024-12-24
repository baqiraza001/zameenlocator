<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\TestimonialSlider;
use App\Tables\TestimonialSliderTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialSliderController extends BaseController
{
    public function index(TestimonialSliderTable $dataTable)
    {
        PageTitle::setTitle('Testimonial Sliders');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $testimonialSlider = new TestimonialSlider();

        PageTitle::setTitle('Testimonial Sliders / Add Testimonial Slider');

        return view('admin.testimonial-sliders.create', compact('testimonialSlider'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $testimonialSlider = new TestimonialSlider();

        $testimonialSlider->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.testimonial-sliders.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $testimonialSlider = TestimonialSlider::findOrFail($id);

        PageTitle::setTitle('Testimonial Sliders / Edit Testimonial Slider');

        return view('admin.testimonial-sliders.edit', compact('testimonialSlider'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $testimonialSlider = TestimonialSlider::findOrFail($id);
        $testimonialSlider->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.testimonial-sliders.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $testimonialSlider = TestimonialSlider::findOrFail($id);

            $existingFile = public_path(TestimonialSlider::TESTIMONIAL_SLIDER_IMAGES_PATH.$testimonialSlider->image);
            if (file_exists($existingFile))
                unlink($existingFile);

            $testimonialSlider->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
