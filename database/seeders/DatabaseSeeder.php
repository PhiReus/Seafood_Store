<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(CategorySeed::class);
        // $this->call(ProductSeed::class);
        $this->call(CustomerSeed::class);
        // $this->call(OrderSeed::class);
        // $this->call(GroupSeed::class);
        // $this->call(UserSeed::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     CategorySeed::class,
        //     ProductSeed::class,
        //     CustomerSeed::class,
        //     GroupSeed::class,
        //     UserSeed::class,
        //     GroupSeed::class,
        //     RoleSeeder::class,
        //     Group_RoleSeeder::class,

        // ]);
    }
}
