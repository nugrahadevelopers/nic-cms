<?php

namespace Modules\Blog\Http\Controllers\Like;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;
use Modules\Blog\Services\Like\BlogLikeService;

class LikeController extends Controller
{
    private $blogLikeService;

    public function __construct(BlogLikeService $blogLikeService)
    {
        $this->blogLikeService = $blogLikeService;
    }

    public function like(Request $request, Post $post)
    {
        $response = $this->blogLikeService->likePost($post, $request->user()->id);

        return response()->json($response);
    }

    public function unlike(Request $request, Post $post)
    {
        $response = $this->blogLikeService->unlikePost($post, $request->user()->id);

        return response()->json($response);
    }

    public function count(Post $post)
    {
        $response = $this->blogLikeService->countLikes($post);

        return response()->json($response);
    }
}
