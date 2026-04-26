<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $event=Event::inRandomOrder()->first();
        $quantity=$this->faker->numberBetween(1, $event->available_seats);
        $event->available_seats-=$quantity;
        $event->save();
        return [
        'event_id' => $event->id ?? Event::factory()->create()->id,
        'user_id'=>User::where('role','user')->inRandomOrder()->first()->id ?? User::factory()->create()->id,
        'quantity'=>$quantity,
        'total_price'=>$event->price * $quantity,
        'status'=> $this->faker->randomElement(['pending','confirmed','cancelled']),
        ];
    }
}
