<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Nike Air Max 270',
                'slug' => 'nike-air-max-270',
                'description' => 'La Nike Air Max 270 offre un confort exceptionnel avec son unité Max Air visible de 270°. Parfaite pour le quotidien et le sport léger.',
                'price' => 149.99,
                'image' => 'https://via.placeholder.com/400x300/000000/FFFFFF?text=Nike+Air+Max+270',
                'stock_quantity' => 15,
                'brand' => 'Nike',
                'color' => 'Noir',
                'size' => '42',
                'is_active' => true,
            ],
            [
                'name' => 'Adidas Ultra Boost 22',
                'slug' => 'adidas-ultra-boost-22',
                'description' => 'L\'Ultra Boost 22 combine un amorti responsive avec une tige Primeknit respirante. Idéale pour la course et les déplacements quotidiens.',
                'price' => 189.99,
                'image' => 'https://via.placeholder.com/400x300/000000/FFFFFF?text=Adidas+Ultra+Boost+22',
                'stock_quantity' => 8,
                'brand' => 'Adidas',
                'color' => 'Blanc',
                'size' => '43',
                'is_active' => true,
            ],
            [
                'name' => 'Puma RS-X³',
                'slug' => 'puma-rs-x3',
                'description' => 'La Puma RS-X³ allie style rétro et technologie moderne. Parfaite pour ceux qui cherchent une chaussure audacieuse.',
                'price' => 119.99,
                'image' => 'https://via.placeholder.com/400x300/000000/FFFFFF?text=Puma+RS-X3',
                'stock_quantity' => 12,
                'brand' => 'Puma',
                'color' => 'Rouge',
                'size' => '44',
                'is_active' => true,
            ],
            [
                'name' => 'New Balance 574',
                'slug' => 'new-balance-574',
                'description' => 'Un classique intemporel avec son confort et son style rétro. La 574 est parfaite pour un look décontracté.',
                'price' => 89.99,
                'image' => 'https://via.placeholder.com/400x300/000000/FFFFFF?text=New+Balance+574',
                'stock_quantity' => 20,
                'brand' => 'New Balance',
                'color' => 'Gris',
                'size' => '41',
                'is_active' => true,
            ],
            [
                'name' => 'Converse Chuck Taylor All Star',
                'slug' => 'converse-chuck-taylor-all-star',
                'description' => 'La légendaire Chuck Taylor All Star, un symbole de style depuis des décennies. Parfaite pour tous les looks.',
                'price' => 69.99,
                'image' => 'https://via.placeholder.com/400x300/000000/FFFFFF?text=Converse+Chuck+Taylor',
                'stock_quantity' => 25,
                'brand' => 'Converse',
                'color' => 'Noir',
                'size' => '42',
                'is_active' => true,
            ],
            [
                'name' => 'Vans Old Skool',
                'slug' => 'vans-old-skool',
                'description' => 'La Vans Old Skool est une icône du skate avec son design classique et sa durabilité légendaire.',
                'price' => 79.99,
                'image' => 'https://via.placeholder.com/400x300/000000/FFFFFF?text=Vans+Old+Skool',
                'stock_quantity' => 18,
                'brand' => 'Vans',
                'color' => 'Bleu',
                'size' => '43',
                'is_active' => true,
            ],
            [
                'name' => 'Reebok Classic Leather',
                'slug' => 'reebok-classic-leather',
                'description' => 'La Reebok Classic Leather offre un style rétro avec un confort moderne. Parfaite pour un look casual.',
                'price' => 94.99,
                'image' => 'https://via.placeholder.com/400x300/000000/FFFFFF?text=Reebok+Classic+Leather',
                'stock_quantity' => 10,
                'brand' => 'Reebok',
                'color' => 'Blanc',
                'size' => '44',
                'is_active' => true,
            ],
            [
                'name' => 'ASICS Gel-Kayano 29',
                'slug' => 'asics-gel-kayano-29',
                'description' => 'La Gel-Kayano 29 offre stabilité et amorti pour les coureurs de tous niveaux. Technologie de pointe.',
                'price' => 159.99,
                'image' => 'https://via.placeholder.com/400x300/000000/FFFFFF?text=ASICS+Gel-Kayano+29',
                'stock_quantity' => 6,
                'brand' => 'ASICS',
                'color' => 'Noir/Orange',
                'size' => '45',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
