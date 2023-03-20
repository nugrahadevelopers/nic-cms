<?php

namespace Modules\Blog\Services\Post;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\Post\PostInterface;
use OpenAI\Client;

class BlogPostService
{
    private $postInterface;
    private $openAIClient;

    public function __construct(PostInterface $postInterface, Client $openAIClient)
    {
        $this->postInterface = $postInterface;
        $this->openAIClient = $openAIClient;
    }

    public function get()
    {
        $result = $this->postInterface->all();
        return $result;
    }

    public function getPopular()
    {
        $result = $this->postInterface->popular();
        return $result;
    }

    public function generateContentWithOpenAI(string $prompt)
    {
        $response = $this->openAIClient->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Kamu adalah penulis artikel profesional.'
                ],
                [
                    'role' => 'user',
                    'content' => 'Buatkan artikel dengan topik ' . $prompt . ' hasilnya berupa markdown'
                ]
            ],
            'max_tokens' => 1500,
            'temperature' => 0.5,
        ]);

        return $response['choices'][0]['message']['content'];
    }

    public function createPost(array $data)
    {
        DB::beginTransaction();
        try {
            $post = $this->postInterface->create($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        if (array_key_exists('category_id', $data)) {
            try {
                $post->categories()->attach($data['category_id']);
            } catch (\Throwable $th) {
                DB::rollBack();
                info($th->getMessage());
                return Helpers::sendAlert(false, $th->getMessage());
            }
        }

        if (array_key_exists('tag_id', $data)) {
            try {
                $post->tags()->attach($data['tag_id']);
            } catch (\Throwable $th) {
                DB::rollBack();
                info($th->getMessage());
                return Helpers::sendAlert(false, $th->getMessage());
            }
        }

        if (request()->featured_img) {
            try {
                $post->addMediaFromRequest('featured_img')->toMediaCollection('featured_img');
            } catch (\Throwable $th) {
                DB::rollBack();
                info($th->getMessage());
                return Helpers::sendAlert(false, $th->getMessage());
            }
        }

        DB::commit();
        return Helpers::sendAlert(true, 'Post berhasil ditambahkan.');
    }

    public function uploadContentImage()
    {
        return response()->json([
            'success' => 1,
            'message' => 'Sukses Upload.',
            'url' => 'http://niccms.test/media/15/apa-yang-di-laravel-dan-ekosistem-nya-m19vjr.jpg',
        ]);
    }

    public function updatePost(Post $post, array $data)
    {
        DB::beginTransaction();
        try {
            $this->postInterface->update($post, $data);
        } catch (\Throwable $th) {
            DB::rollBack();
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        if (array_key_exists('category_id', $data)) {
            try {
                $post->categories()->sync($data['category_id']);
            } catch (\Throwable $th) {
                DB::rollBack();
                info($th->getMessage());
                return Helpers::sendAlert(false, $th->getMessage());
            }
        }

        if (array_key_exists('tag_id', $data)) {
            try {
                $post->tags()->sync($data['tag_id']);
            } catch (\Throwable $th) {
                DB::rollBack();
                info($th->getMessage());
                return Helpers::sendAlert(false, $th->getMessage());
            }
        }

        if (request()->featured_img) {
            try {
                $post->clearMediaCollection('featured_img');
                $post->addMediaFromRequest('featured_img')->toMediaCollection('featured_img');
            } catch (\Throwable $th) {
                DB::rollBack();
                info($th->getMessage());
                return Helpers::sendAlert(false, $th->getMessage());
            }
        }

        DB::commit();
        return Helpers::sendAlert(true, 'Post berhasil diubah.');
    }

    public function deletePost(Post $post)
    {
        DB::beginTransaction();
        try {
            $post->categories()->detach();
            $post->tags()->detach();
            $post->clearMediaCollection('featured_img');
            $this->postInterface->delete($post);
        } catch (\Throwable $th) {
            DB::rollBack();
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        DB::commit();
        return Helpers::sendAlert(true, 'Post berhasil dihapus.');
    }
}
