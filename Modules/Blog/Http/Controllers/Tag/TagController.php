<?php

namespace Modules\Blog\Http\Controllers\Tag;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Http\Requests\Tag\CreateTagRequest;
use Modules\Blog\Http\Requests\Tag\UpdateTagRequest;
use Modules\Blog\Services\Tag\BlogTagService;

class TagController extends Controller
{
    private $blogTagService;

    public function __construct(BlogTagService $blogTagService)
    {
        $this->blogTagService = $blogTagService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('blog::tags.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::tags.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateTagRequest $request)
    {
        $result = $this->blogTagService->createTag($request->validated());

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.blog.tags.index')->with('alert', $result);
        }
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
    public function edit(Tag $tag)
    {
        return view('blog::tags.edit', [
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $result = $this->blogTagService->updateTag($tag, $request->validated());

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.blog.tags.index')->with('alert', $result);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Tag $tag)
    {
        $result = $this->blogTagService->deleteTag($tag);

        if ($result['success'] == false) {
            return redirect()->back()->with('alert', $result);
        } else {
            return redirect()->route('admin.blog.tags.index')->with('alert', $result);
        }
    }
}
