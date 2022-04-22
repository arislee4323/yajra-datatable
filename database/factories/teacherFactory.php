<?php

namespace Database\Factories;
use App\Models\teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class teacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            'nip' => $this->faker->randomDigit,
            'course' => 'math',
            'grade' => $this->faker->numberBetween(80,100)
        ];
    }
}
