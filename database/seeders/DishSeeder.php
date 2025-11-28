<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    public function run(): void
    {
        $entrees = Category::where('name', 'Entrées')->first();
        $plats = Category::where('name', 'Plats Principaux')->first();
        $desserts = Category::where('name', 'Desserts')->first();
        $boissons = Category::where('name', 'Boissons')->first();

        $dishes = [
            // Entrées
            [
                'name' => 'Carpaccio de Saumon',
                'description' => 'Tranches fines de saumon frais, huile d\'olive et citron',
                'price' => 8500,
                'category_id' => $entrees->id,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Salade César',
                'description' => 'Laitue romaine, croûtons, parmesan et sauce césar maison',
                'price' => 6500,
                'category_id' => $entrees->id,
                'sort_order' => 2,
            ],
            [
                'name' => 'Bruschetta Tomates Basilic',
                'description' => 'Pain grillé garni de tomates fraîches et basilic',
                'price' => 5500,
                'category_id' => $entrees->id,
                'sort_order' => 3,
            ],

            // Plats Principaux
            [
                'name' => 'Filet de Boeuf Rossini',
                'description' => 'Filet de boeuf, foie gras et sauce au porto',
                'price' => 18500,
                'category_id' => $plats->id,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Poulet Fermier Rôti',
                'description' => 'Poulet fermier rôti aux herbes de Provence',
                'price' => 12500,
                'category_id' => $plats->id,
                'sort_order' => 2,
            ],
            [
                'name' => 'Risotto aux Champignons',
                'description' => 'Risotto crémeux aux champignons sauvages',
                'price' => 9500,
                'category_id' => $plats->id,
                'is_featured' => true,
                'sort_order' => 3,
            ],

            // Desserts
            [
                'name' => 'Fondant au Chocolat',
                'description' => 'Gâteau au chocolat fondant, cœur coulant',
                'price' => 4500,
                'category_id' => $desserts->id,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Tarte Tatin',
                'description' => 'Tarte aux pommes caramélisées, glace vanille',
                'price' => 5000,
                'category_id' => $desserts->id,
                'sort_order' => 2,
            ],

            // Boissons
            [
                'name' => 'Vin Rouge Maison',
                'description' => 'Verre de vin rouge de notre sélection',
                'price' => 3500,
                'category_id' => $boissons->id,
                'sort_order' => 1,
            ],
            [
                'name' => 'Cocktail Signature',
                'description' => 'Notre cocktail signature aux fruits frais',
                'price' => 6000,
                'category_id' => $boissons->id,
                'sort_order' => 2,
            ],
        ];

        foreach ($dishes as $dish) {
            Dish::create([
                'name' => $dish['name'],
                'slug' => Str::slug($dish['name']),
                'description' => $dish['description'],
                'price' => $dish['price'],
                'category_id' => $dish['category_id'],
                'is_available' => true,
                'is_featured' => $dish['is_featured'] ?? false,
                'sort_order' => $dish['sort_order'],
            ]);
        }
    }
}
