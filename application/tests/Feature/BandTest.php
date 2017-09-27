<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

class BandTest extends TestCase
{
    public function testStore()
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
     * @depends testStore
     */
    public function testIndex()
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
     * @depends testIndex
     */
    public function testShow()
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
     * @depends testShow
     */
    public function testUpdate()
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
     * @depends testUpdate
     */
    public function testDestroy()
    {
        // Act
        $deleteResponse = $this->json('DELETE', "/api/bands/1");
        $showResponse = $this->json('GET', "/api/bands/1");

        // Assert
        $deleteResponse->assertStatus(204);
        $showResponse->assertStatus(404);
    }
}
