<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $source = $this->faker->randomElement(['Distributor', 'ChannelManager', 'Commander', 'Import', 'Connector', 'Navigator']);
        $status = $this->faker->randomElement(['Enquired', 'Requested', 'Optional', 'Confirmed', 'Started', 'Processed', 'Canceled']);
        return [
            "user_id" => User::factory(),
            "room_id" => Room::factory(),
            "source" => $source,
            "status" => $status,
            "segment" => "Leisure",
            "start" => $this->faker->date(),
            "end" => $this->faker->date(),
            "cancelled_at" => $this->faker->date(),
            "created_at_in_pms" => $this->faker->date(),
        ];
    }
}
