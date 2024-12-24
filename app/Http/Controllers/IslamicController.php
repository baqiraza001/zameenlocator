<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\Islamic;
use App\Tables\IslamicTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IslamicController extends BaseController
{
    public function index(IslamicTable $dataTable)
    {
        PageTitle::setTitle('Islamic');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $islamic = new Islamic();

        PageTitle::setTitle('Islamic / Add Islamic Ayat');

        return view('admin.islamic.create', compact('islamic'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $islamic = new Islamic();

        $islamic->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.islamic.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $islamic = Islamic::findOrFail($id);

        PageTitle::setTitle('Islamic / Edit Islamic Ayat');

        return view('admin.islamic.edit', compact('islamic'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $islamic = Islamic::findOrFail($id);
        $islamic->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.islamic.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        $islamic = Islamic::findOrFail($id);
        $islamic->delete();
        return $response->setMessage('Deleted successfully');
    }
}
