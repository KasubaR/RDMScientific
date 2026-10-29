<?php

namespace Database\Factories;

use App\Enums\EnquiryType;
use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Enquiry>
 */
class EnquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'organization' => fake()->company(),
            'email' => fake()->safeEmail(),
            'phone' => '+260977000000',
            'type' => fake()->randomElement(EnquiryType::cases()),
            'subject' => fake()->sentence(4),
            'message' => fake()->paragraph(),
            'privacy_accepted_at' => now(),
        ];
    }
}
