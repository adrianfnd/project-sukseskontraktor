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
                'description' => 'Description for Excavator',
                'category' => 'Construction',
                'stock' => 10,
                'manufacturer' => 'Manufacturer A',
                'model_number' => 'Model A',
                'warranty_months' => 12,
                'weight' => 10.5,
                'dimensions' => '10x10x10',
            ],
            [
                'name' => 'Bulldozer',
                'price' => 3000000000,
                'image_url' => 'UOhZcduxIr_1709402418.jpg',
                'description' => 'Description for Bulldozer',
                'category' => 'Construction',
                'stock' => 5,
                'manufacturer' => 'Manufacturer B',
                'model_number' => 'Model B',
                'warranty_months' => 24,
                'weight' => 20.5,
                'dimensions' => '20x20x20',
            ],
            [
                'name' => 'Wheel Loader',
                'price' => 1500000000,
                'image_url' => 'GYER7LMStJ_1709402451.jpg',
                'description' => 'Description for Wheel Loader',
                'category' => 'Construction',
                'stock' => 3,
                'manufacturer' => 'Manufacturer C',
                'model_number' => 'Model C',
                'warranty_months' => 6,
                'weight' => 5.5,
                'dimensions' => '5x5x5',
            ],
            [
                'name' => 'Motor Grader',
                'price' => 2500000000,
                'image_url' => 'dQdNfU2bY1_1709402464.jpg',
                'description' => 'Description for Motor Grader',
                'category' => 'Construction',
                'stock' => 7,
                'manufacturer' => 'Manufacturer D',
                'model_number' => 'Model D',
                'warranty_months' => 18,
                'weight' => 15.5,
                'dimensions' => '15x15x15',
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
