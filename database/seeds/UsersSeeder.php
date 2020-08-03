<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'yahyaalfariz@gmail.com',
            'password' => bcrypt('yahya3028'),
            'status' => 'Disetujui',
            'role' => 'administrator',
        ]);
    }
}
