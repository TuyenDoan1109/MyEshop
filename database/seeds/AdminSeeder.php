<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'doantuyen90',
                'email' => 'doantuyen90@gmail.com',
                'phone' => '0936827526',
                'avatar' => 'tuyen_avatar.jpg',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'tuyen_admin',
                'email' => 'tuyen_admin@gmail.com',
                'phone' => '0936827526',
                'avatar' => 'tuyen_avatar.jpg',
                'email_verified_at' => now(),
                'password' => '$2y$10$mHArcO4i/wq0tNhaDCtTS.moH8xe2bCfPViKu9xJi8HDlYgBVGrwW',   // pas: 12345678
                'remember_token' => Str::random(10),

                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        factory(Admin::class, 20)->create();
    }
}