<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_route_user(): void
    {
        $this->get('/shop1')->assertStatus(200);
        // $this->get('/products/create')->assertStatus(302);
    }
}
