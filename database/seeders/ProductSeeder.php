<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Neon 90s High-Tops',
                'description' => 'Bring back the 90s with these vibrant neon high-tops. Perfect for the arcade or the street. Made with premium synthetic leather and a chunky sole for that authentic retro feel.',
                'price' => 850000,
                'image_path' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' // retro shoes
            ],
            [
                'name' => 'Retro Vaporwave Kicks',
                'description' => 'Aesthetic vaporwave inspired sneakers with pastel pink and cyan accents. These low-tops will make you feel like you are walking on a digital sunset.',
                'price' => 720000,
                'image_path' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' // red nike
            ],
            [
                'name' => 'Classic Arcade Runners',
                'description' => 'Inspired by the 8-bit era, these runners feature a pixelated design pattern and are built for maximum comfort. Game on!',
                'price' => 650000,
                'image_path' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' // colorful shoes
            ],
            [
                'name' => 'Cyberpunk Low-Tops',
                'description' => 'Step into the future of the past. These dark sneakers with bright yellow accents scream 1980s sci-fi.',
                'price' => 950000,
                'image_path' => 'https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' // yellow shoes
            ]
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'price' => $product['price'],
                'image_path' => $product['image_path'],
            ]);
        }
    }
}
