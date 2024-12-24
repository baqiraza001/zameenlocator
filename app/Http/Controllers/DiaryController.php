<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\Diary;
use App\Tables\DiaryTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends BaseController
{
    public function index(DiaryTable $dataTable)
    {
        PageTitle::setTitle('Diaries');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $diary = new Diary();

        PageTitle::setTitle('Diaries / Add Diary');

        return view('admin.diaries.create', compact('diary'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $diary = new Diary();
        $diary->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.diaries.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $diary = Diary::findOrFail($id);

        PageTitle::setTitle('Diaries / Edit Diary');

        return view('admin.diaries.edit', compact('diary'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $diary = Diary::findOrFail($id);
        $diary->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.diaries.index'))
        ->setMessage('Updated successfully');
    }

    public function updateStatus($id, Request $request, BaseHttpResponse $response)
    {
        $diary = Diary::findOrFail($id);

        if ($request->has('approve')) {
            $diary->status = 1;
        } elseif ($request->has('disapprove')) {
            $diary->status = 0; 
        }

        $diary->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.diaries.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $diary = Diary::findOrFail($id);

            $existingFile = public_path(Diary::DIARY_IMAGES_PATH.$diary->image1);
            if (file_exists($existingFile))
                unlink($existingFile);

            $existingFile = public_path(Diary::DIARY_IMAGES_PATH.$diary->image2);
            if (file_exists($existingFile))
                unlink($existingFile);
            
            $diary->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
