<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Tables\BlogCategoryTable;
use App\Models\BlogCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends BaseController
{
    public function index(BlogCategoryTable $dataTable)
    {
        PageTitle::setTitle('Blog Categories');

        return $dataTable->renderTable();
    }

    public function create()
    {
        $blogCategory = new BlogCategory();
        
        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Blog Categories / Add Blog Category');

        return view('admin.blogs-categories.create', compact('blogCategory'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $blogCategory = new BlogCategory();

        $blogCategory->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.blogs-categories.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Blog Categories / Edit Blog Category');

        return view('admin.blogs-categories.edit', compact('blogCategory'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $blogCategory = BlogCategory::findOrFail($id);
        $blogCategory->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.blogs-categories.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $blogCategory = BlogCategory::findOrFail($id);

            $existingFile = public_path(BlogCategory::BLOG_CATEGORIES_IMAGES_PATH.$blogCategory->img);
            if (file_exists($existingFile))
                unlink($existingFile);

            $blogCategory->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
