<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Cua Cà Mau',
            'slug' => '-',
            'price' => '200.000',
            'description' => '200.000/kg',
            'quantity' => 240,
            'status' => 1,
            'image' => 'image',
            'category_id' => 1

        ]);
    }
}
