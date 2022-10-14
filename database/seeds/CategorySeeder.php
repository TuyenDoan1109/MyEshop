<?php

use Illuminate\Database\Seeder;
use App\Category;

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

        ]);

        // factory(Category::class, 10)->create();
    }
}
