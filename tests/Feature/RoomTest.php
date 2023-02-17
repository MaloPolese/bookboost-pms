<?php

namespace Tests\Feature;

use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoomTest extends TestCase
{
    public function test_get(): void
    {
        $response = $this->get('/api/v1/rooms');

        $response->assertStatus(200);
    }

    public function test_post(): void
    {
        $response = $this->post('/api/v1/rooms', [
            "number" => "create-1",
            "floor" => "create-277"
        ]);

        $response->assertStatus(201);
    }

    public function test_post_bad_payload(): void
    {
        $response = $this->post('/api/v1/rooms', [
            "number" => "create-1",
        ]);

        $response->assertStatus(302);
    }

    public function test_put(): void
    {
        $lastId = Room::all()->last()->id;

        $response = $this->put('/api/v1/rooms/' . $lastId, [
            "number" => "update-1",
            "floor" => "update-277"
        ]);

        $response->assertStatus(200);
    }

    public function test_put_bad_payload(): void
    {
        $lastId = Room::all()->last()->id;

        $response = $this->put('/api/v1/rooms/' . $lastId, [
            "number" => "update-1",
        ]);

        $response->assertStatus(302);
    }

    public function test_patch(): void
    {
        $lastId = Room::all()->last()->id;

        $response = $this->patch('/api/v1/rooms/' . $lastId, [
            "number" => "patch-1",
            "floor" => "patch-277"
        ]);

        $response->assertStatus(200);
    }


    public function test_delete(): void
    {
        $lastId = Room::all()->last()->id;

        $response = $this->delete('/api/v1/rooms/' . $lastId);

        $response->assertStatus(200);
    }
}
