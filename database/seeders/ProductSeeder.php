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
                'name' => 'Dump Truck',
                'price' => 15000000.00,
                'image_url' => 'path_to_dump_truck_image.jpg',
                'description' => 'Dump Truck dengan kapasitas minimal 3.5 Ton.',
                'category' => 'Konstruksi',
                'stock' => 5,
                'manufacturer' => 'Produsen A',
                'model_number' => 'Model DT1',
                'warranty_months' => 12,
                'weight' => 3500.00,
                'dimensions' => '8x3x3.5',
            ],
            [
                'name' => 'Excavator',
                'price' => 25000000.00,
                'image_url' => 'path_to_excavator_image.jpg',
                'description' => 'Excavator dengan kapasitas 80-140 HP.',
                'category' => 'Konstruksi',
                'stock' => 10,
                'manufacturer' => 'Produsen B',
                'model_number' => 'Model EX1',
                'warranty_months' => 12,
                'weight' => 20000.00,
                'dimensions' => '6x2.5x3',
            ],
            [
                'name' => 'Motor Grader',
                'price' => 35000000.00,
                'image_url' => 'path_to_motor_grader_image.jpg',
                'description' => 'Motor Grader dengan kapasitas lebih dari 100 HP.',
                'category' => 'Konstruksi',
                'stock' => 7,
                'manufacturer' => 'Produsen C',
                'model_number' => 'Model MG1',
                'warranty_months' => 18,
                'weight' => 18000.00,
                'dimensions' => '6x2.5x3',
            ],
            [
                'name' => 'Wheel Loader',
                'price' => 20000000.00,
                'image_url' => 'path_to_wheel_loader_image.jpg',
                'description' => 'Wheel Loader dengan kapasitas 1.0-1.6 M3.',
                'category' => 'Konstruksi',
                'stock' => 3,
                'manufacturer' => 'Produsen D',
                'model_number' => 'Model WL1',
                'warranty_months' => 6,
                'weight' => 15000.00,
                'dimensions' => '5x2x2.5',
            ],
            [
                'name' => 'Tandem Roller',
                'price' => 18000000.00,
                'image_url' => 'path_to_tandem_roller_image.jpg',
                'description' => 'Tandem Roller dengan kapasitas 6-8 Ton.',
                'category' => 'Konstruksi',
                'stock' => 4,
                'manufacturer' => 'Produsen E',
                'model_number' => 'Model TR1',
                'warranty_months' => 12,
                'weight' => 7000.00,
                'dimensions' => '4x2x2.5',
            ],
            [
                'name' => 'Vibratory Roller',
                'price' => 20000000.00,
                'image_url' => 'path_to_vibratory_roller_image.jpg',
                'description' => 'Vibratory Roller dengan kapasitas 5-8 Ton.',
                'category' => 'Konstruksi',
                'stock' => 6,
                'manufacturer' => 'Produsen F',
                'model_number' => 'Model VR1',
                'warranty_months' => 12,
                'weight' => 6500.00,
                'dimensions' => '4x2x2.5',
            ],
            [
                'name' => 'Asphalt Sprayer',
                'price' => 12000000.00,
                'image_url' => 'path_to_asphalt_sprayer_image.jpg',
                'description' => 'Asphalt Sprayer dengan kapasitas 850 Liter.',
                'category' => 'Konstruksi',
                'stock' => 8,
                'manufacturer' => 'Produsen G',
                'model_number' => 'Model AS1',
                'warranty_months' => 12,
                'weight' => 850.00,
                'dimensions' => '3x1.5x2',
            ],
            [
                'name' => 'Concrete Mixer',
                'price' => 10000000.00,
                'image_url' => 'path_to_concrete_mixer_image.jpg',
                'description' => 'Concrete Mixer dengan kapasitas 0,3-0,6 M3.',
                'category' => 'Konstruksi',
                'stock' => 10,
                'manufacturer' => 'Produsen H',
                'model_number' => 'Model CM1',
                'warranty_months' => 12,
                'weight' => 500.00,
                'dimensions' => '2.5x1.5x2',
            ],
            [
                'name' => 'Water Tanker',
                'price' => 15000000.00,
                'image_url' => 'path_to_water_tanker_image.jpg',
                'description' => 'Water Tanker dengan kapasitas 3000-4500 Liter.',
                'category' => 'Konstruksi',
                'stock' => 5,
                'manufacturer' => 'Produsen I',
                'model_number' => 'Model WT1',
                'warranty_months' => 12,
                'weight' => 4000.00,
                'dimensions' => '6x2.5x3',
            ],
            [
                'name' => 'Backhoe Loader',
                'price' => 22000000.00,
                'image_url' => 'path_to_backhoe_loader_image.jpg',
                'description' => 'Backhoe Loader digunakan untuk menggali dan memuat material.',
                'category' => 'Konstruksi',
                'stock' => 7,
                'manufacturer' => 'Produsen J',
                'model_number' => 'Model BL1',
                'warranty_months' => 12,
                'weight' => 8000.00,
                'dimensions' => '5.5x2x3',
            ],
            [
                'name' => 'Skid Steer Loader',
                'price' => 16000000.00,
                'image_url' => 'path_to_skid_steer_loader_image.jpg',
                'description' => 'Skid Steer Loader digunakan untuk pekerjaan kecil dan cepat.',
                'category' => 'Konstruksi',
                'stock' => 6,
                'manufacturer' => 'Produsen K',
                'model_number' => 'Model SS1',
                'warranty_months' => 12,
                'weight' => 3000.00,
                'dimensions' => '3.5x1.5x2.5',
            ],
            [
                'name' => 'Crawler Loader',
                'price' => 28000000.00,
                'image_url' => 'path_to_crawler_loader_image.jpg',
                'description' => 'Crawler Loader digunakan untuk menggali dan memuat material di medan berat.',
                'category' => 'Konstruksi',
                'stock' => 4,
                'manufacturer' => 'Produsen L',
                'model_number' => 'Model CL1',
                'warranty_months' => 12,
                'weight' => 25000.00,
                'dimensions' => '7x2.5x3.5',
            ],
            [
                'name' => 'Paver',
                'price' => 30000000.00,
                'image_url' => 'path_to_paver_image.jpg',
                'description' => 'Paver digunakan untuk meratakan aspal pada jalan.',
                'category' => 'Konstruksi',
                'stock' => 5,
                'manufacturer' => 'Produsen M',
                'model_number' => 'Model P1',
                'warranty_months' => 12,
                'weight' => 9000.00,
                'dimensions' => '5x2.5x3',
            ],
            [
                'name' => 'Scraper',
                'price' => 25000000.00,
                'image_url' => 'path_to_scraper_image.jpg',
                'description' => 'Scraper digunakan untuk memotong, menggali, dan memuat tanah.',
                'category' => 'Konstruksi',
                'stock' => 4,
                'manufacturer' => 'Produsen N',
                'model_number' => 'Model S1',
                'warranty_months' => 12,
                'weight' => 22000.00,
                'dimensions' => '6.5x2.5x3.5',
            ],
            [
                'name' => 'Telehandler',
                'price' => 18000000.00,
                'image_url' => 'path_to_telehandler_image.jpg',
                'description' => 'Telehandler digunakan untuk mengangkat material ke tempat yang tinggi.',
                'category' => 'Konstruksi',
                'stock' => 6,
                'manufacturer' => 'Produsen O',
                'model_number' => 'Model T1',
                'warranty_months' => 12,
                'weight' => 11000.00,
                'dimensions' => '4.5x2.5x3',
            ],
            [
                'name' => 'Trencher',
                'price' => 14000000.00,
                'image_url' => 'path_to_trencher_image.jpg',
                'description' => 'Trencher digunakan untuk menggali parit.',
                'category' => 'Konstruksi',
                'stock' => 8,
                'manufacturer' => 'Produsen P',
                'model_number' => 'Model T2',
                'warranty_months' => 12,
                'weight' => 6000.00,
                'dimensions' => '4x2x2.5',
            ],
            [
                'name' => 'Pile Driver',
                'price' => 32000000.00,
                'image_url' => 'path_to_pile_driver_image.jpg',
                'description' => 'Pile Driver digunakan untuk menancapkan tiang pancang.',
                'category' => 'Konstruksi',
                'stock' => 4,
                'manufacturer' => 'Produsen Q',
                'model_number' => 'Model PD1',
                'warranty_months' => 12,
                'weight' => 18000.00,
                'dimensions' => '6x2.5x3',
            ],
            [
                'name' => 'Dragline Excavator',
                'price' => 35000000.00,
                'image_url' => 'path_to_dragline_excavator_image.jpg',
                'description' => 'Dragline Excavator digunakan untuk menggali dan mengangkat material berat.',
                'category' => 'Konstruksi',
                'stock' => 3,
                'manufacturer' => 'Produsen R',
                'model_number' => 'Model DE1',
                'warranty_months' => 12,
                'weight' => 40000.00,
                'dimensions' => '8x3x4',
            ],
            [
                'name' => 'Feller Buncher',
                'price' => 26000000.00,
                'image_url' => 'path_to_feller_buncher_image.jpg',
                'description' => 'Feller Buncher digunakan untuk menebang pohon dan mengumpulkan kayu.',
                'category' => 'Konstruksi',
                'stock' => 5,
                'manufacturer' => 'Produsen S',
                'model_number' => 'Model FB1',
                'warranty_months' => 12,
                'weight' => 15000.00,
                'dimensions' => '5x2.5x3',
            ],
            [
                'name' => 'Harvester',
                'price' => 27000000.00,
                'image_url' => 'path_to_harvester_image.jpg',
                'description' => 'Harvester digunakan untuk memanen tanaman.',
                'category' => 'Pertanian',
                'stock' => 6,
                'manufacturer' => 'Produsen T',
                'model_number' => 'Model H1',
                'warranty_months' => 12,
                'weight' => 12000.00,
                'dimensions' => '5x2.5x3',
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
