<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'order_date' => '2023-05-15',
            'delivery_date' => '2023-05-20',
            'total_amount' => '200',
            'quantity' => 5,
            'customer_id' => 1,
            'product_id' => 2,
            'created_at' => '2023-06-14',
            'updated_at' => '2023-06-15',
        ]);
    }
}
