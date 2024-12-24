<?php

namespace App\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Tables\BlogTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends BaseController
{
    public function index(BlogTable $dataTable)
    {
        PageTitle::setTitle('Blogs');

        return $dataTable->renderTable();
    }


    public function create()
    {
        $blog = new Blog();
    
        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Blogs / Add Blog');

        $blogCategories = BlogCategory::all();

        return view('admin.blogs.create', compact('blog', 'blogCategories'));

    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $blog = new Blog();

        $blog->fill($request->all())->save();

        return $response
        ->setNextUrl(route('admin.zameenlocator.blogs.index'))
        ->setMessage('Created successfully');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        $currentUrl = request()->url();
        $urlParts = explode('/', $currentUrl);
        $lastPart = end($urlParts);

        PageTitle::setTitle('Blogs / Edit Blog');
        
        $blogCategories = BlogCategory::all();

        return view('admin.blogs.edit', compact('blog', 'blogCategories'));
    }

    public function update($id, Request $request, BaseHttpResponse $response)
    {
        $blog = Blog::findOrFail($id);
        $blog->fill($request->all())->update();

        return $response
        ->setNextUrl(route('admin.zameenlocator.blogs.index'))
        ->setMessage('Updated successfully');
    }

    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $blog = Blog::findOrFail($id);

            $existingFile = public_path(Blog::BLOG_IMAGES_PATH.$blog->img);
            if (file_exists($existingFile))
                unlink($existingFile);

            $blog->delete();

            return $response->setMessage('Deleted successfully');
        } catch (Exception $exception) {
            return $response
            ->setError()
            ->setMessage($exception->getMessage());
        }
    }
}
