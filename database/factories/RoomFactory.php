<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    protected $model = Room::class;

    public function definition()
    {
        $roomTypes = ['Standard', 'Deluxe', 'Luxury', 'Suite', 'Family'];
        $properties = ['Free Wi-Fi', 'AC', 'TV', 'Minibar', 'Bath Tub', 'Balcony'];

        return [
            'hotel_id' => Hotel::factory(), // Akan membuat Hotel baru jika belum ada
            'name' => $this->faker->unique()->word . ' Room ' . $this->faker->buildingNumber,
            'type' => $this->faker->randomElement($roomTypes),
            'price' => $this->faker->numberBetween(200000, 1500000),
            'status' => $this->faker->randomElement(['tersedia', 'disewa']),
            'properties' => $this->faker->randomElements($properties, $this->faker->numberBetween(1, count($properties))),
        ];
    }
}
