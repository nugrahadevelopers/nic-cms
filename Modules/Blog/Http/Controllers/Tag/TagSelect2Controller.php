<?php

namespace Modules\Blog\Http\Controllers\Tag;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Repositories\Tag\TagInterface;

class TagSelect2Controller extends Controller
{
    private $tagInterface;

    public function __construct(TagInterface $tagInterface)
    {
        $this->tagInterface = $tagInterface;
    }

    public function select(Request $request)
    {
        if ($request->ajax()) {
            $categories = $this->tagInterface->all()->get();
            $arr_data = new Collection();

            foreach ($categories as $category) {
                $arr_data->push(['id' => $category->id, 'text' => $category->name]);
            }

            return response()->json($arr_data);
        }
    }
}
