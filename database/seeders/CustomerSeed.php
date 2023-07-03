<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'name' => 'Lôi Vô Kiệt',
            'phone' => '0971320503',
            'address' => 'Linh Chiểu',
            'email' => 'Phireus2002@gmail.com',
            'password' => bcrypt('123456'),
            'image' => 'image'
        ]);
    }
}
