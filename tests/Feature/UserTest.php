<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_get(): void
    {
        $response = $this->get('/api/v1/users');

        $response->assertStatus(200);
    }

    public function test_post(): void
    {
        $response = $this->post('/api/v1/users', [
            "firstname" => "Malo",
            "lastname" => "Polese",
            "phone" => "0574621548",
            "local" => "FR",
            "email" => "olam@yahoo.com"
        ]);

        $response->assertStatus(201);
    }

    public function test_post_taken_email(): void
    {
        $response = $this->post('/api/v1/users', [
            "firstname" => "Malo",
            "lastname" => "Polese",
            "phone" => "0574621548",
            "local" => "FR",
            "email" => "olam@yahoo.com"
        ]);

        $response->assertStatus(302);
    }

    public function test_post_bad_payload(): void
    {
        $response = $this->post('/api/v1/users', [
            "firstname" => "Malo",
            "lastname" => "Polese",
            "phone" => "0574621548",
            "local" => "FR",
        ]);

        $response->assertStatus(302);
    }

    public function test_post_bad_email(): void
    {
        $response = $this->post('/api/v1/users', [
            "firstname" => "Malo",
            "lastname" => "Polese",
            "phone" => "0574621548",
            "local" => "FR",
            "email" => "olamyahoo.com"
        ]);

        $response->assertStatus(302);
    }

    public function test_put(): void
    {
        $lastId = User::all()->last()->id;

        $response = $this->put('/api/v1/users/' . $lastId, [
            "firstname" => "Malo",
            "lastname" => "Polese",
            "phone" => "0574621548",
            "local" => "FR",
            "email" => "malo@yahoo.com",
        ]);

        $response->assertStatus(200);
    }

    public function test_put_bad_payload(): void
    {
        $lastId = User::all()->last()->id;

        $response = $this->put('/api/v1/users/' . $lastId, [
            "firstname" => "Malo",
            "lastname" => "Polese",
            "phone" => "0574621548",
            "local" => "FR",
        ]);

        $response->assertStatus(302);
    }

    public function test_patch(): void
    {
        $lastId = User::all()->last()->id;

        $response = $this->patch('/api/v1/users/' . $lastId, [
            "firstname" => "Patch",
            "lastname" => "Patch",
        ]);

        $response->assertStatus(200);
    }

    public function test_delete(): void
    {
        $lastId = User::all()->last()->id;

        $response = $this->delete('/api/v1/users/' . $lastId);

        $response->assertStatus(200);
    }
}
