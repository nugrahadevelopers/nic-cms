<?php

namespace Modules\Blog\Http\Controllers\Tag;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Repositories\Tag\TagInterface;

class TagDatatableController extends Controller
{
    private $tagInterface;

    public function __construct(TagInterface $tagInterface)
    {
        $this->tagInterface = $tagInterface;
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $tags = $this->tagInterface->all();
            return datatables()
                ->of($tags)
                ->addColumn('action', function ($tag) {
                    return view('components.table-action', [
                        'editRoute' => route('admin.blog.tags.edit', $tag),
                        'deleteRoute' => route('admin.blog.tags.delete', $tag),
                        'deleteData' => $tag->name,
                    ]);
                })
                ->addIndexColumn()
                ->make(true);
        }
    }
}
