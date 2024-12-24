<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\Popup;
use App\Tables\PopupTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PopupController extends BaseController
{
    public function index(PopupTable $dataTable)
    {
        PageTitle::setTitle('Popups');

        return $dataTable->renderTable();
    }


    public function create()
    {
        PageTitle::setTitle('Popups / Add Popup');
        
        $popup = new Popup();
        return view('admin.popups.create', compact('popup'));
    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $popup = new Popup();

        $popup->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.popups.index'))
        ->setMessage('Uploaded successfully');
    }


    public function edit($id)
    {
        $popup = Popup::findOrFail($id);

        PageTitle::setTitle('Popups / Edit Popup');

        return view('admin.popups.edit', compact('popup'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $popup = Popup::findOrFail($id);
        $popup->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.popups.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $popup = Popup::findOrFail($id);

            $existingFile = public_path(Popup::POPUP_IMAGES_PATH.$popup->image);
            if (file_exists($existingFile))
                unlink($existingFile);

            $popup->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request, BaseHttpResponse $response)
    {
        $popup = Popup::findOrFail($id);

        if ($request->has('approve')) {
            $popup->status = 1;
        } elseif ($request->has('disapprove')) {
            $popup->status = 0; 
        }

        $popup->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.popups.index'))
        ->setMessage('Updated successfully');
    }
}
