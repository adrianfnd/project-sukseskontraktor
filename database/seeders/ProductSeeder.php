<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Excavator',
                'price' => 2000000000,
                'image_url' => 'D3fg9izdcI_1709402405.jpg',
            ],
            [
                'name' => 'Bulldozer',
                'price' => 3000000000,
                'image_url' => 'UOhZcduxIr_1709402418.jpg',
            ],
            [
                'name' => 'Wheel Loader',
                'price' => 1500000000,
                'image_url' => 'GYER7LMStJ_1709402451.jpg',
            ],
            [
                'name' => 'Motor Grader',
                'price' => 2500000000,
                'image_url' => 'dQdNfU2bY1_1709402464.jpg',
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
