<?php

namespace Modules\Blog\Http\Controllers\Post;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;
use Modules\Blog\Http\Requests\Post\CreatePostRequest;
use Modules\Blog\Http\Requests\Post\UpdatePostRequest;
use Modules\Blog\Services\Post\BlogPostService;

class PostController extends Controller
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
        return view('blog::posts.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreatePostRequest $request)
    {
        $result = $this->blogPostService->createPost($request->validated());

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.blog.posts.index')->with('alert', $result);
        }
    }

    public function uploadContentImage(Request $request)
    {
        return $this->blogPostService->uploadContentImage();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Post $post)
    {
        return view('blog::posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $result = $this->blogPostService->updatePost($post, $request->validated());

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.blog.posts.index')->with('alert', $result);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Post $post)
    {
        $result = $this->blogPostService->deletePost($post);

        if ($result['success'] == false) {
            return redirect()->back()->with('alert', $result);
        } else {
            return redirect()->route('admin.blog.posts.index')->with('alert', $result);
        }
    }
}
