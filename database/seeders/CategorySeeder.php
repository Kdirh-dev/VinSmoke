<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Entrées',
                'description' => 'Nos délicieuses entrées pour commencer votre repas',
                'sort_order' => 1,
            ],
            [
                'name' => 'Plats Principaux',
                'description' => 'Plats principaux préparés avec des ingrédients frais',
                'sort_order' => 2,
            ],
            [
                'name' => 'Desserts',
                'description' => 'Douceurs et desserts maison pour terminer en beauté',
                'sort_order' => 3,
            ],
            [
                'name' => 'Boissons',
                'description' => 'Sélection de vins et boissons rafraîchissantes',
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'sort_order' => $category['sort_order'],
                'is_active' => true,
            ]);
        }
    }
}
