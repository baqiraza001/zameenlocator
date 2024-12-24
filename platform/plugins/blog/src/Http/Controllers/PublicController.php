<?php

namespace Botble\Blog\Http\Controllers;

use Botble\Base\Facades\BaseHelper;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Blog\Services\BlogService;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Slug\Facades\SlugHelper;
use Botble\Theme\Events\RenderingSingleEvent;
use Botble\Theme\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Botble\SeoHelper\SeoOpenGraph;

class PublicController extends Controller
{
    public function getSearch(Request $request, PostInterface $postRepository)
    {
        $query = BaseHelper::stringify($request->input('q'));

        if (! $query || ! is_string($query)) {
            abort(404);
        }

        $title = __('Search result for: ":query"', compact('query'));

        SeoHelper::setTitle($title)
        ->setDescription($title);

        $posts = $postRepository->getSearch($query, 0, 12);

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'))
        ->add($title, route('public.search'));

        return Theme::scope('search', compact('posts'))
        ->render();
    }

    public function getTag(string $slug, BlogService $blogService)
    {
        $slug = SlugHelper::getSlug($slug, SlugHelper::getPrefix(Tag::class));

        if (! $slug) {
            abort(404);
        }

        $data = $blogService->handleFrontRoutes($slug);

        if (isset($data['slug']) && $data['slug'] !== $slug->key) {
            return redirect()->to(route('public.single', SlugHelper::getPrefix(Tag::class) . '/' . $data['slug']));
        }

        event(new RenderingSingleEvent($slug));

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
        ->render();
    }

    public function getPost(string $slug, BlogService $blogService)
    {
        $slug = SlugHelper::getSlug($slug, SlugHelper::getPrefix(Post::class));

        if (! $slug) {
            abort(404);
        }

        $data = $blogService->handleFrontRoutes($slug);

        if (isset($data['slug']) && $data['slug'] !== $slug->key) {
            return redirect()->to(route('public.single', SlugHelper::getPrefix(Post::class) . '/' . $data['slug']));
        }

        event(new RenderingSingleEvent($slug));

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
        ->render();
    }

    public function getCategory(string $slug, BlogService $blogService)
    {
        $categoryName = preg_replace("/[^a-zA-Z0-9- ]+/", "", str_replace('-', ' ', $slug));
        $category = BlogCategory::where('category', $categoryName)->first();
        
        if (! $category) {
            abort(404);
        }
        SeoHelper::setTitle(ucwords($category->category) . ' Blogs')
        ->setDescription($category->category);

        $meta = new SeoOpenGraph();
        if ($category->img) {
            $meta->setImage(asset(BlogCategory::BLOG_CATEGORIES_IMAGES_PATH . $category->img));
        }
        $meta->setDescription($category->category);
        $meta->setUrl(URL('blogs/'.$slug));
        $meta->setTitle($category->category);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);
        SeoHelper::meta()->setUrl(URL('blogs/'.$slug));

        $posts = Blog::where('blog_id', $category->id)
        ->paginate((int) theme_option('number_of_posts_in_a_category', 12));

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add($category->category, URL('blogs/'.$slug));

        $data = [
            'view' => 'category',
            'default_view' => 'plugins/blog::themes.category',
            'data' => compact('category', 'posts'),
            'slug' => $category->slug,
        ];

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
        ->render();
    }

    public function getBlogDetail($slug = '', $id = '')
    {
        $post = Blog::where('id', $id)->first();
        if (! $post) {
            abort(404);
        }

        $category = BlogCategory::where('id', $post->blog_id)->first();
        $categorySlug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', trim($category->category)));

        SeoHelper::setTitle(ucwords($post->name))
        ->setDescription($post->name);

        $meta = new SeoOpenGraph();
        if ($post->img) {
            $meta->setImage(asset(Blog::BLOG_IMAGES_PATH . $post->img));
        }
        $meta->setDescription($post->name);
        $meta->setUrl(URL('blog-detail/'.$slug.'/'.$id));
        $meta->setTitle($post->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);
        SeoHelper::meta()->setUrl(URL('blog-detail/'.$slug.'/'.$id));

        Theme::breadcrumb()
        ->add(__('Home'), route('public.index'));
        Theme::breadcrumb()->add($post->name, URL('blog-detail/'.$slug.'/'.$id));

        $data = [
            'view' => 'post',
            'default_view' => 'plugins/blog::themes.post',
            'data' => compact('post', 'category', 'slug', 'categorySlug'),
            'slug' => $slug,
            'category' => $category,
            'categorySlug' => $categorySlug,
        ];

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
        ->render();
    }
}
