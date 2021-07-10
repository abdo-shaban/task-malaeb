<?php

namespace Database\Factories;

use App\Models\StadiumPitch;
use Illuminate\Database\Eloquent\Factories\Factory;

class StadiumPitchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StadiumPitch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
