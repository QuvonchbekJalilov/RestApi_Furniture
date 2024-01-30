<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            "name"=> [
                "uz"=> "Stol",
                "ru"=> "Стол",
            ],
        ]);

        $category->childCategories()->create([
            "name"=> [
                "uz"=> "office",
                "ru"=> "office",
            ],
        ]);

        $childCategory = $category->childCategories()->create([
            "name"=> [
                "uz"=> "gaming",
                "ru"=> "gaming",
            ],
        ]);
        $childCategory->childCategories()->create([
            "name"=> [
                "uz"=> "RGB",
                "ru"=> "RGB",
            ],
        ]);
        $childCategory->childCategories()->create([
            "name"=> [
                "uz"=> "women",
                "ru"=> "women",
            ],
        ]);
        $childCategory->childCategories()->create([
            "name"=> [
                "uz"=> "black",
                "ru"=> "black",
            ],
        ]);



        $category->childCategories()->create([
            "name"=> [
                "uz"=> "yumshoq",
                "ru"=> "yumshoq",
            ],
        ]);

        Category::create([
            "name"=> [
                "uz"=> "Divan",
                "ru"=> "Диван",
            ],
        ]);

        Category::create([
            "name"=> [
                "uz"=> "Kreslo",
                "ru"=> "Кресло",
            ],
        ]);

        Category::create([
            "name"=> [
                "uz"=> "Yotoq",
                "ru"=> "Кровать",
            ],
        ]);

        Category::create([
            "name"=> [
                "uz"=> "Stul",
                "ru"=> "Стул",
            ],
        ]);
    }
}
