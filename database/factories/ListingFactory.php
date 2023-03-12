<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'user_id' => 123,
            'logo' => "logo.png",
            'company' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'tags' => 'Laravel, Api, Backend',
            'location' => $this->faker->city(),
            'website' => $this->faker->url(),
            'description' => $this->faker->paragraph(5),

        ];
    }
}
