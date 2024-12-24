<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\Template;
use App\Models\District;
use App\Tables\TemplateTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends BaseController
{
    public function index(TemplateTable $dataTable)
    {
        PageTitle::setTitle('Template Maps');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $template = new Template();
    
        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Template Maps / Add Template Map');

        return view('admin.templates.create', compact('template'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $template = new Template();

        $template->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.templates.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $template = Template::findOrFail($id);

        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Template Maps / Edit Template Map');

        return view('admin.templates.edit', compact('template'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $template = Template::findOrFail($id);
        $template->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.templates.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $template = Template::findOrFail($id);

            $existingFile = public_path(Template::TEMPLATE_IMAGES_PATH.$template->img);
            if (file_exists($existingFile))
                unlink($existingFile);

            $template->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
