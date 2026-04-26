<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@admin.com',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'test@example.com',
        ]);

        User::factory(10)->create();

        Category::factory(5)->create();
        Event::factory(20)->create();
        Booking::factory(50)->create();
    }
}
