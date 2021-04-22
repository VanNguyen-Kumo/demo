<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\String\b;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->uuid(),
            'username'=>$this->faker->unique()->userName(),
            'password'=>bcrypt('123456'),
            'confirm_password'=>bcrypt('123456')
        ];
    }
}
