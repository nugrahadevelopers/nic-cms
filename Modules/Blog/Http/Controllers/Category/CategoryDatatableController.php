<?php

namespace Modules\Blog\Http\Controllers\Category;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Repositories\Category\CategoryInterface;

class CategoryDatatableController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $categories = $this->categoryInterface->all();
            return datatables()
                ->of($categories)
                ->addColumn('parent', function ($category) {
                    return $category->parent->name ?? '';
                })
                ->addColumn('action', function ($category) {
                    return view('components.table-action', [
                        'editRoute' => route('admin.blog.categories.edit', $category),
                        'deleteRoute' => route('admin.blog.categories.delete', $category),
                        'deleteData' => $category->name,
                    ]);
                })
                ->addIndexColumn()
                ->make(true);
        }
    }
}
