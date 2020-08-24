<?php

use Illuminate\Database\Seeder;

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
            'name' => "admin",
            'email' => 'admin@admin.com',
            'level' => 0,
            'password' => Hash::make('admin'),
            'first_name' =>  "admin",
            'last_name' =>  "admin",
            'display_name' => "admin",
            'privacy' => true,
            'phone_no' => '0812354862',
        ]);
        DB::table('authors')->insert([
            'id' => 1,
            'name' => "admin",
        ]);
        DB::table('suppliers')->insert([
            'id' => 1,
            'name' => "supplier",
            'description' => "supplier",
        ]);
        DB::table('Settings')->insert([
            'id' => 1,
            'name' => "First Setting",
        ]);
    }
}
