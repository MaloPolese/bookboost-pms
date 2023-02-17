<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $service = new MewsService(
        //     baseUrl: strval(config('services.mews.url')),
        //     apiClientToken: strval(config('services.mews.clientToken')),
        //     apiAccessToken: strval(config('services.mews.accessToken')),
        //     apiClient: strval(config('services.mews.client')),
        // );

        // $response = $service->reservation()->list([
        //     "StartUtc" => "2016-01-01T00:00:00Z",
        //     "EndUtc" => "2016-01-07T00:00:00Z"
        // ]);

        Reservation::factory()->count(10)->create();
    }
}
