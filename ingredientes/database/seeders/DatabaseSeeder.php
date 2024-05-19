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
            'name' => 'tomato',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'lemon',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'potato',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'rice',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'ketchup',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'lettuce',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'onion',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'cheese',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'meat',
            'units' => 10
        ]);
        DB::table('Ingredients')->insert([
            'name' => 'chicken',
            'units' => 10
        ]);
    }
}
