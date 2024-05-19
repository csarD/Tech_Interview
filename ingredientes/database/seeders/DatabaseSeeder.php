<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('Ingredients')->insert([
            'name' => 'Tomato',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'Lemon',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'Potato',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'Rice',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'Ketchup',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'Lettuce',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'Onion',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'Cheese',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'Meat',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'Chicken',
            'units' => 10
        ]);
    }
}
