<?php

use Illuminate\Database\Seeder;
use App\Brand;

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
                'brand_name' => 'Xiaomi',
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

        ]);

        // factory(Brand::class, 10)->create();
    }
}
