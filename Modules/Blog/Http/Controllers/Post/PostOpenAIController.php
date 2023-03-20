<?php

namespace Modules\Blog\Http\Controllers\Post;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Services\Post\BlogPostService;

class PostOpenAIController extends Controller
{
    private $blogPostService;

    public function __construct(BlogPostService $blogPostService)
    {
        $this->blogPostService = $blogPostService;
    }

    /**
     * Generate Post Content With OpenAI
     * @return Renderable
     */
    public function generate(Request $request)
    {
        return $this->blogPostService->generateContentWithOpenAI($request->query('prompt'));
    }
}
