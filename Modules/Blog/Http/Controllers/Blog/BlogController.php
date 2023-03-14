<?php

namespace Modules\Blog\Http\Controllers\Blog;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;
use Modules\Blog\Services\Post\BlogPostService;
use Stevebauman\Location\Facades\Location;

class BlogController extends Controller
{
    private $blogPostService;

    public function __construct(BlogPostService $blogPostService)
    {
        $this->blogPostService = $blogPostService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = $this->blogPostService->get();
        $popularPosts = $this->blogPostService->getPopular();
        return view('blog::blog.index', [
            'posts' => $posts,
            'popularPosts' => $popularPosts,
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Post $post)
    {
        $countryId = '';
        $countryName = '';
        $cityName = '';

        if ($position = Location::get()) {
            $countryId = $position->countryCode;
            $countryName = $position->countryName;
            $cityName = $position->cityName;
        }

        $post->visit()->withIP()->withSession()->withUser()->withData(['country_id' => $countryId, 'country_name' => $countryName, 'city_name' => $cityName]);
        return view('blog::blog.partials.article.default', [
            'post' => $post
        ]);
    }
}
