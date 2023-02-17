<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Services\Mews\MewsService;
use App\Services\Mews\Repository\ReservationRepository;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "number" => $this->faker->randomNumber(),
            "floor" => $this->faker->randomNumber(),
        ];
    }
}
