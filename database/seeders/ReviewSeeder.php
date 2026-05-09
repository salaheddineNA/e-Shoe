<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'product_id' => 1, // Nike Air Max 270
                'customer_name' => 'Marie Dupont',
                'customer_email' => 'marie.dupont@email.com',
                'rating' => 5,
                'comment' => 'Excellent produit ! Très confortable et parfait pour la course. La qualité est remarquable et le design est magnifique.',
                'is_approved' => true,
            ],
            [
                'product_id' => 1,
                'customer_name' => 'Jean Martin',
                'customer_email' => 'jean.martin@email.com',
                'rating' => 4,
                'comment' => 'Très bonnes chaussures, un peu chères mais la qualité justifie le prix. Je les recommande vivement.',
                'is_approved' => true,
            ],
            [
                'product_id' => 2, // Adidas Ultra Boost 22
                'customer_name' => 'Sophie Bernard',
                'customer_email' => 'sophie.bernard@email.com',
                'rating' => 5,
                'comment' => 'Je suis absolument ravie ! Le confort est incroyable et elles sont parfaites pour mes séances de sport.',
                'is_approved' => true,
            ],
            [
                'product_id' => 3, // Puma RS-X³
                'customer_name' => 'Pierre Durand',
                'customer_email' => 'pierre.durand@email.com',
                'rating' => 3,
                'comment' => 'Bon produit mais j\'aurais aimé plus de options de couleur. Le confort est correct.',
                'is_approved' => true,
            ],
            [
                'product_id' => 4, // New Balance 574
                'customer_name' => 'Isabelle Petit',
                'customer_email' => 'isabelle.petit@email.com',
                'rating' => 5,
                'comment' => 'Classique intemporel ! Je les porte tous les jours. Très confortables et durables.',
                'is_approved' => true,
            ],
            [
                'product_id' => 5, // Converse Chuck Taylor
                'customer_name' => 'Lucas Robert',
                'customer_email' => 'lucas.robert@email.com',
                'rating' => 4,
                'comment' => 'Iconiques et stylées. Un peu rigides au début mais elles s\'assouplissent avec le temps.',
                'is_approved' => true,
            ],
            [
                'product_id' => 6, // Vans Old Skool
                'customer_name' => 'Emma Leroy',
                'customer_email' => 'emma.leroy@email.com',
                'rating' => 5,
                'comment' => 'Parfaites pour le skate et le quotidien. Le design est génial et elles résistent bien.',
                'is_approved' => true,
            ],
            [
                'product_id' => 7, // Reebok Classic Leather
                'customer_name' => 'Nicolas Moreau',
                'customer_email' => 'nicolas.moreau@email.com',
                'rating' => 4,
                'comment' => 'Très bon rapport qualité-prix. Style rétro que j\'adore. Confortables pour la marche.',
                'is_approved' => true,
            ],
            [
                'product_id' => 8, // ASICS Gel-Kayano 29
                'customer_name' => 'Camille Dubois',
                'customer_email' => 'camille.dubois@email.com',
                'rating' => 5,
                'comment' => 'Meilleures chaussures de course que j\'ai jamais eues ! Le soutien et l\'amorti sont parfaits.',
                'is_approved' => true,
            ],
            // Some pending reviews for admin moderation
            [
                'product_id' => 1,
                'customer_name' => 'Antoine Girard',
                'customer_email' => 'antoine.girard@email.com',
                'rating' => 4,
                'comment' => 'Très satisfait de mon achat. Livraison rapide et produit conforme à la description.',
                'is_approved' => false,
            ],
            [
                'product_id' => 2,
                'customer_name' => 'Léa Blanchet',
                'customer_email' => 'lea.blanchet@email.com',
                'rating' => 5,
                'comment' => 'Exceptionnel ! Je recommande à tous les coureurs. Vraiment le meilleur choix.',
                'is_approved' => false,
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
