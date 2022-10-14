<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            [
                'name' => 'Processing',

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Accepted',

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'On Delivery',

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Delivered',

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cancelled',

                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
