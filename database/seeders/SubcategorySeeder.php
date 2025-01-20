<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Получаем все созданные категории
        $categories = Category::all();

        // Создаем минимум 2 подкатегории для каждой категории
        foreach ($categories as $category) {
            Subcategory::factory(2)->create([
                'category_id' => $category->id,
            ]);
        }

        // Создаем дополнительные подкатегории, чтобы общее число было 20
        $remainingSubcategories = 20 - ($categories->count() * 2);
        if ($remainingSubcategories > 0) {
            Subcategory::factory($remainingSubcategories)->create();
        }
    }

}
