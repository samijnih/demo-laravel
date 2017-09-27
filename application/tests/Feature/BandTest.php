<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

class BandTest extends TestCase
{
    /**
     * @test
     */
    public function store()
    {
        // Arrange
        $data = ['name' => 'Born Of Osiris'];

        // Act
        $response = $this->json('POST', '/api/bands', $data);

        // Assert
        $response
            ->assertStatus(201)
            ->assertJson($data);
    }

    /**
     * @test
     * @depends store
     */
    public function index()
    {
        // Arrange
        $data = [
            'total' => 1,
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Born Of Osiris',
                ],
            ],
        ];

        // Act
        $response = $this->json('GET', "/api/bands");

        // Assert
        $response
            ->assertStatus(200)
            ->assertJson($data);
    }

    /**
     * @test
     * @depends index
     */
    public function show()
    {
        // Arrange
        $data = ['id' => 1, 'name' => 'Born Of Osiris'];

        // Act
        $response = $this->json('GET', "/api/bands/1");

        // Assert
        $response
            ->assertStatus(200)
            ->assertJson($data);
    }

    /**
     * @test
     * @depends show
     */
    public function update()
    {
        // Arrange
        $data = ['name' => 'Veil Of Maya'];

        // Act
        $response = $this->json('PUT', "/api/bands/1", $data);

        // Assert
        $response
            ->assertStatus(200)
            ->assertJson($data);
    }

    /**
     * @test
     * @depends update
     */
    public function destroy()
    {
        // Act
        $deleteResponse = $this->json('DELETE', "/api/bands/1");
        $showResponse = $this->json('GET', "/api/bands/1");

        // Assert
        $deleteResponse->assertStatus(204);
        $showResponse->assertStatus(404);
    }
}
