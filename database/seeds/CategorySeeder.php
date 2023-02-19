<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Phone',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Laptop',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Tablet',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Stereo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Smart Watch',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Smart Home',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Tivi',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'PC & Laptop Accessories',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Smartphone Accessories',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);

        // factory(Category::class, 10)->create();
    }
}
