<?php

namespace Modules\Blog\Http\Controllers\Category;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Repositories\Category\CategoryInterface;

class CategorySelect2Controller extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function select(Request $request)
    {
        if ($request->ajax()) {
            $categories = $this->categoryInterface->all()->get();
            $arr_data = new Collection();

            foreach ($categories as $category) {
                $arr_data->push(['id' => $category->id, 'text' => $category->name]);
            }

            return response()->json($arr_data);
        }
    }

    public function getSelectedParent(Request $request, Category $category)
    {
        if ($request->ajax()) {
            $parent = $category->parent;
            $arr_data = new Collection();

            $arr_data->push(['id' => $parent->id, 'text' => $parent->name]);

            return response()->json($arr_data);
        }
    }
}
