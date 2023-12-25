<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $number = Category::all()->random();
        $user = User::find($number->id)->only('id');

        return [
            "is_done" => fake()->boolean(),
            "title" => fake()->name(),
            "description" => fake()->text(),
            "due_date" => now(),
            "user_id" => $user['id'],
            "category_id" => $number->id
        ];
    }
}
