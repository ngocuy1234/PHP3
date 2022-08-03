<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgknloRr9xBoktiXZwU-anDF02ZnC_COe7GU8A6jHhUgoWtANJjgnwhlnqpGEfvShJWIo&usqp=CAU',
            'room_id' =>  Room::all()->random()->id,
            'status' => 1,
        ];
    }
}
