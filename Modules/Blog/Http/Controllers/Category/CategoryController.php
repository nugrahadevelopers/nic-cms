<?php

namespace Modules\Blog\Http\Controllers\Category;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Http\Requests\Category\CreateCategoryRequest;
use Modules\Blog\Http\Requests\Category\UpdateCategoryRequest;
use Modules\Blog\Services\Category\BlogCategoryService;

class CategoryController extends Controller
{
    private $blogCategoryService;

    public function __construct(BlogCategoryService $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('blog::categories.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateCategoryRequest $request)
    {
        $result = $this->blogCategoryService->createCategory($request->validated());

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.blog.categories.index')->with('alert', $result);
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
    public function edit(Category $category)
    {
        return view('blog::categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $result = $this->blogCategoryService->updateCategory($category, $request->validated());

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.blog.categories.index')->with('alert', $result);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Category $category)
    {
        $result = $this->blogCategoryService->deleteCategory($category);

        if ($result['success'] == false) {
            return redirect()->back()->with('alert', $result);
        } else {
            return redirect()->route('admin.blog.categories.index')->with('alert', $result);
        }
    }
}
