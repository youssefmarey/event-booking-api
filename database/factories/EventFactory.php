<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('now', '+1 year');
        $endDate = clone $startDate;
        $endDate->modify('+2 days');
        return [
        'category_id'=>Category::inRandomOrder()->first()->id ?? Category::factory()->create()->id,
        'title'=>$this->faker->sentence(),
        'description'=>$this->faker->paragraph(),
        'start_time'=>$startDate,
        'end_time'=>$endDate,
        'location'=>$this->faker->city(),
        'price'=>$this->faker->randomFloat(2, 0, 5000),
        'available_seats'=>$this->faker->numberBetween(10, 100),
        'image'=>$this->faker->imageUrl(),
        'is_active'=>$this->faker->boolean(),
        ];
    }
}
