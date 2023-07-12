<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StatusFactory extends Factory
{

    protected $model = Status::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'identifier' => strtolower(Str::random(32)),
            'body' => $this->faker->sentence(),
        ];
    }
}
