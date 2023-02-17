<?php

namespace Tests\Feature;

use App\Models\Reservation;
use Tests\TestCase;

class ReservationTest extends TestCase
{

    public function test_get(): void
    {
        $response = $this->get('/api/v1/reservations');

        $response->assertStatus(200);
    }

    public function test_post(): void
    {
        $response = $this->post('/api/v1/reservations', [
            "status" => "Enquired",
            "source" => "Optional",
            "segment" => "Created",
            "start" => "1983-05-25 00:00:00",
            "end" => "1980-05-27 00:00:00",
            "cancelledAt" => "1993-03-26 00:00:00",
            "createdAtInPms" => "1974-12-27 00:00:00"
        ]);

        $response->assertStatus(201);
    }

    public function test_multiple_reservation_for_same_room(): void
    {
        $this->post('/api/v1/users', [
            "firstname" => "Malo",
            "lastname" => "Polese",
            "phone" => "0574621548",
            "local" => "FR",
            "email" => "testreservation1@yahoo.com"
        ]);
        $this->post('/api/v1/users', [
            "firstname" => "John",
            "lastname" => "Doe",
            "phone" => "0574621548",
            "local" => "FR",
            "email" => "testreservation2@yahoo.com"
        ]);

        $this->post('/api/v1/rooms', [
            "number" => "create-1",
            "floor" => "create-277"
        ]);

        $response = $this->post('/api/v1/reservations', [
            "userId" => 1,
            "roomId" => 1,
            "status" => "Commander",
            "source" => "Enquired",
            "segment" => "Created",
            "start" => "1983-05-25 00:00:00",
            "end" => "1980-05-27 00:00:00",
            "cancelledAt" => "1993-03-26 00:00:00",
            "createdAtInPms" => "1974-12-27 00:00:00"
        ]);

        $response = $this->post('/api/v1/reservations', [
            "userId" => 2,
            "roomId" => 1,
            "status" => "Commander",
            "source" => "Enquired",
            "segment" => "Created",
            "start" => "1983-05-25 00:00:00",
            "end" => "1980-05-27 00:00:00",
            "cancelledAt" => "1993-03-26 00:00:00",
            "createdAtInPms" => "1974-12-27 00:00:00"
        ]);

        $response->assertStatus(403);
    }

    public function test_post_bad_user(): void
    {
        $response = $this->post('/api/v1/reservations', [
            "userId" => 9999,
            "status" => "Commander",
            "source" => "Enquired",
            "segment" => "Created",
            "start" => "1983-05-25 00:00:00",
            "end" => "1980-05-27 00:00:00",
            "cancelledAt" => "1993-03-26 00:00:00",
            "createdAtInPms" => "1974-12-27 00:00:00"
        ]);

        $response->assertStatus(302);
    }

    public function test_post_bad_room(): void
    {
        $response = $this->post('/api/v1/reservations', [
            "roomId" => 9999,
            "status" => "Commander",
            "source" => "Distributor",
            "segment" => "Created",
            "start" => "1983-05-25 00:00:00",
            "end" => "1980-05-27 00:00:00",
            "cancelledAt" => "1993-03-26 00:00:00",
            "createdAtInPms" => "1974-12-27 00:00:00"
        ]);

        $response->assertStatus(302);
    }

    public function test_post_bad_date(): void
    {
        $response = $this->post('/api/v1/reservations', [
            "roomId" => 9999,
            "status" => "ChannelManager",
            "source" => "Distributor",
            "segment" => "Created",
            "start" => "1",
            "end" => "1980-05-27 00:00:00",
            "cancelledAt" => "1",
            "createdAtInPms" => "1974-12-27 00:00:00"
        ]);

        $response->assertStatus(302);
    }

    public function test_post_bad_payload(): void
    {
        $response = $this->post('/api/v1/reservations', [
            "roomId" => 9999,
            "status" => "Created",
            "s" => "Created",
            "segment" => "Created"
        ]);

        $response->assertStatus(302);
    }

    public function test_put(): void
    {
        $lastId = Reservation::all()->last()->id;

        $response = $this->put('/api/v1/reservations/' . $lastId, [
            "status" => "ChannelManager",
            "source" => "Distributor",
            "segment" => "Updated",
            "start" => "1983-05-25 00:00:00",
            "end" => "1980-05-27 00:00:00",
            "cancelledAt" => "1993-03-26 00:00:00",
            "createdAtInPms" => "1974-12-27 00:00:00"
        ]);

        $response->assertStatus(200);
    }

    public function test_patch(): void
    {
        $lastId = Reservation::all()->last()->id;

        $response = $this->patch('/api/v1/reservations/' . $lastId, [
            "status" => "Patched",
        ]);

        $response->assertStatus(200);
    }

    public function test_delete(): void
    {
        $lastId = Reservation::all()->last()->id;

        $response = $this->delete('/api/v1/reservations/' . $lastId);

        $response->assertStatus(200);
    }
}
