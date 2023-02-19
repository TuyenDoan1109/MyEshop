<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'brand_name' => 'Apple',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Samsung',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Dell',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Oppo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Vivo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Nokia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Realme',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Asus',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'HP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Xiaomi',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'SONY',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'MSI',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Acer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'LG',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Gigabyte',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Intel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Microsoft',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Fujitsu',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Logitech',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Toshiba',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_name' => 'Lenovo',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);

        // factory(Brand::class, 10)->create();
    }
}
