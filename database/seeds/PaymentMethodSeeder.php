<?php

use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'name' => 'Cash',

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Credit Card',

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'COD',

                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
