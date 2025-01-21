<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Получаем все созданные подкатегории
        $subcategories = Subcategory::all();

        // Создаем минимум 2 продукта для каждой подкатегории
        foreach ($subcategories as $subcategory) {
            Product::factory(2)->create([
                'subcategory_id' => $subcategory->id,
                'status' => 1,
            ]);
        }

        // Создаем дополнительные продукты, чтобы общее количество было 150
        $remainingProducts = 150 - ($subcategories->count() * 2);
        if ($remainingProducts > 0) {
            Product::factory($remainingProducts)->create();
        }

        Product::factory(50)->create([
            'status' => 1,
        ]);
    }

}
