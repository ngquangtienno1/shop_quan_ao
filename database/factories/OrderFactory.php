<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'order_code' => $this->faker->unique()->randomNumber(8),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'recipient_name' => $this->faker->name(),
            'recipient_phone' => $this->faker->phoneNumber(),
            'recipient_email' => $this->faker->safeEmail(),
            'order_date' => $this->faker->dateTimeThisYear(),
            'total_price' => $this->faker->randomFloat(2, 50, 500),
            'shipping_address' => $this->faker->address(),
            'shipping_fee' => $this->faker->randomFloat(2, 0, 100),
            'payment_status' => $this->faker->randomElement(['Unpaid', 'Paid', 'Refunded']),
            'order_status' => $this->faker->randomElement(['Pending', 'Confirmed', 'Processing', 'Shipping', 'Delivered', 'Completed', 'Canceled']),
            'note' => $this->faker->sentence(),

        ];
    }
}
