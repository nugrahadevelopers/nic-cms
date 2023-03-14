<?php

namespace Modules\Blog\Services\Tag;

use App\Helpers\Helpers;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Repositories\Tag\TagInterface;

class BlogTagService
{
    private $tagInterface;

    public function __construct(TagInterface $tagInterface)
    {
        $this->tagInterface = $tagInterface;
    }

    public function createTag(array $data)
    {
        try {
            $this->tagInterface->create([
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
            ]);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Tag berhasil ditambahkan.');
    }

    public function updateTag(Tag $tag, array $data)
    {
        try {
            $this->tagInterface->update($tag, [
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
            ]);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Tag berhasil diubah.');
    }

    public function deleteTag(Tag $tag)
    {
        try {
            $this->tagInterface->delete($tag);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Tag berhasil dihapus.');
    }
}
