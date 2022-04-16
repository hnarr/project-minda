<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nama' => 'admin',
        ]);
        DB::table('roles')->insert([
            'nama' => 'user',
        ]);
        //Membuat sample admin
        DB::table('users')->insert([
            'roles' => 1,
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        //Membuat sample user
        DB::table('users')->insert([
            'roles' => 2,
            'nama' => 'Hafidza Nur Ainika Rani',
            'username' => 'hafidza',
            'password' => bcrypt('12345678'),
        ]);
    }
}
