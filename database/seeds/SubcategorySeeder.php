<?php

use Illuminate\Database\Seeder;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            [
                'subcategory_name' => 'iOS Phone',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'subcategory_name' => 'Android Phone',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'subcategory_name' => 'Gaming Laptop',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'subcategory_name' => 'Office Laptop',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'subcategory_name' => 'iOS Tablet',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'subcategory_name' => 'Android Tablet',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            

        ]);

        // factory(Subcategory::class, 10)->create();
    }
}
