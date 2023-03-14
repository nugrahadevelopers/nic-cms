<?php

namespace Modules\Blog\Services\Category;

use App\Helpers\Helpers;
use Modules\Blog\Entities\Category;
use Modules\Blog\Repositories\Category\CategoryInterface;

class BlogCategoryService
{
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function createCategory(array $data)
    {
        try {
            $this->categoryInterface->create([
                'name' => $data['name'],
                'parent_id' => $data['parent_id'] ?? null,
                'description' => $data['description'] ?? null,
            ]);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Kategori berhasil ditambahkan.');
    }

    public function updateCategory(Category $category, array $data)
    {
        try {
            $this->categoryInterface->update($category, [
                'name' => $data['name'],
                'parent_id' => $data['parent_id'] ?? null,
                'description' => $data['description'] ?? null,
            ]);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Kategori berhasil diubah.');
    }

    public function deleteCategory(Category $category)
    {
        try {
            $this->categoryInterface->delete($category);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Kategori berhasil dihapus.');
    }
}
