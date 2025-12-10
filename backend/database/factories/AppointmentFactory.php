<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->title(),
            "description" => fake()->paragraph(),
            "date"=> fake()->date(),
            "time"=> fake()->time(),
            "status"=> fake()->randomElement(['pending', 'approved', 'rejected', 'cancelled']),
            'user_id' =>User::where("role", "user")->get(["id"])->random()
        ];
    }
}
