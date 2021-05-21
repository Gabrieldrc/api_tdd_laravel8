<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_store()
    {
        $this->withExceptionHandling();
        $response = $this->json('POST', '/api/posts', [
            'title' => 'El posts de prueba'
        ]);

        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
            ->assertJson(['title' => 'El posts de prueba'])
            ->assertStatus(201); //Ok, creado un recurso

        $this->assertDatabaseHas('posts', ['title' => 'El posts de prueba']);
    }
}
