<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'phone_number' => '0336956600',
            'fullname' => 'Admin',
            'address' => 'Nowhere',
            'permission' => 1,
        ]);

        DB::table('manufactures')->insert([
            'manufacturer_name' => 'Apple',
        ]);
        DB::table('categories')->insert([
            'name' => 'Điện thoại',
            'parent_id' => '0',
        ]);
    }
}
