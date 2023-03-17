<?php

namespace Modules\Blog\Http\Controllers\Blog;

use App\Helpers\Helpers;
use Embed\Embed;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use League\CommonMark\Extension\Embed\Bridge\OscaroteroEmbedAdapter;
use Modules\Blog\Entities\Post;
use Modules\Blog\Services\Post\BlogPostService;
use Spatie\LaravelMarkdown\MarkdownRenderer;
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

        $embedLibrary = new Embed();
        $embedLibrary->setSettings([
            'oembed:query_parameters' => [
                'maxwidth' => 800,
                'maxheight' => 600,
            ],
        ]);

        $cMarkOptions = [
            'heading_permalink' => ['symbol' => ''],
            'table_of_contents' => [
                'position' => 'placeholder',
                'placeholder' => '[TOC]',
            ],
            'embed' => [
                'adapter' => new OscaroteroEmbedAdapter($embedLibrary),
                'allowed_domains' => ['youtube.com', 'twitter.com', 'github.com'],
                'fallback' => 'link',
            ],
            'external_link' => [
                'internal_hosts' => ['haireno.my.id'],
                'open_in_new_window' => true,
            ],
        ];

        $postReadTime = Helpers::estimateReadingTime($post->content);
        $postContent = app(MarkdownRenderer::class)->commonmarkOptions($cMarkOptions)->disableHighlighting()->toHtml($post->content);
        return view('blog::blog.partials.article.default', [
            'post' => $post,
            'postReadTime' => $postReadTime,
            'postContent' => $postContent,
        ]);
    }
}
