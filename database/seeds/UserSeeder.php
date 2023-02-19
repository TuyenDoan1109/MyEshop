<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'tuyen_user',
                'email' => 'tuyen_user@gmail.com',
                'phone' => '0936827526',
                'address' => 'Phượng Dưc, Phú Xuyên, Hà Nội',
                'avatar' => 'tuyen_avatar.jpg',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),

                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);

        factory(User::class, 20)->create();
    }
}
