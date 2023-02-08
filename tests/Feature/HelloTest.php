<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HelloTest extends TestCase
{
    // DBの初期化とマイグレーションを行っているので必須！！！
    // test実行初回時、テーブルが一切ないので本記述がなければ「no such table」となる 
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHello()
    {
        $this->assertTrue(true);

        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/hello');
        $response->assertStatus(302);

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/hello');
        $response->assertStatus(200);

        $response = $this->get('/no_route');
        $response->assertStatus(404);
    }
}
