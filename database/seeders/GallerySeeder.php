<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            [
                'title' => 'Notre Salle Principale',
                'description' => 'L\'élégante salle principale de VinSmoke',
                'sort_order' => 1,
            ],
            [
                'title' => 'Terrasse Jardin',
                'description' => 'Notre terrasse ombragée pour les dîners en plein air',
                'sort_order' => 2,
            ],
            [
                'title' => 'Bar à Vins',
                'description' => 'Notre sélection exclusive de vins',
                'sort_order' => 3,
            ],
            [
                'title' => 'Cuisine Ouverte',
                'description' => 'Nos chefs en action dans la cuisine',
                'sort_order' => 4,
            ],
        ];

        foreach ($images as $image) {
            Gallery::create([
                'title' => $image['title'],
                'description' => $image['description'],
                'image' => 'gallery/placeholder.jpg', // Tu pourras remplacer par de vraies images
                'is_active' => true,
                'sort_order' => $image['sort_order'],
            ]);
        }
    }
}
