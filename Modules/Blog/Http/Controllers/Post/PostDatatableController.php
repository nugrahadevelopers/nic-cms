<?php

namespace Modules\Blog\Http\Controllers\Post;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Blog\Repositories\Post\PostInterface;

class PostDatatableController extends Controller
{
    private $postInterface;

    public function __construct(PostInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $posts = $this->postInterface->all();
            return datatables()
                ->of($posts)
                ->addColumn('excerpt', function ($post) {
                    return Str::limit($post->excerpt, 150);
                })
                ->addColumn('created_by', function ($post) {
                    return $post->createdBy->name;
                })
                ->addColumn('categories', function ($post) {
                    return view('blog::posts.partials.badge', [
                        'datas' => $post->categories,
                    ]);
                })
                ->addColumn('tags', function ($post) {
                    return view('blog::posts.partials.badge', [
                        'datas' => $post->tags,
                    ]);
                })
                ->addColumn('action', function ($post) {
                    return view('components.table-action', [
                        'editRoute' => route('admin.blog.posts.edit', $post),
                        'deleteRoute' => route('admin.blog.posts.delete', $post),
                        'deleteData' => $post->title,
                    ]);
                })
                ->addIndexColumn()
                ->make(true);
        }
    }
}
