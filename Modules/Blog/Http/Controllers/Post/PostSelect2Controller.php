<?php

namespace Modules\Blog\Http\Controllers\Post;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;

class PostSelect2Controller extends Controller
{
    public function getPostCategory(Post $post)
    {
        $categories = $post->categories;
        $arr_data = new Collection();

        if ($categories != null) {
            foreach ($categories as $data) {
                $arr_data->push(['id' => $data->id, 'text' => $data->name]);
            }
        }

        return response()->json($arr_data);
    }

    public function getPostTag(Post $post)
    {
        $tags = $post->tags;
        $arr_data = new Collection();

        if ($tags != null) {
            foreach ($tags as $data) {
                $arr_data->push(['id' => $data->id, 'text' => $data->name]);
            }
        }

        return response()->json($arr_data);
    }
}
