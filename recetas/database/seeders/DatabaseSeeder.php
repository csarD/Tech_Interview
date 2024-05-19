<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('Recipes')->insert([
            'name' => 'Receta 1',
            'duration' => 5
        ]);
        DB::table('Recipes')->insert([
            'name' => 'Receta 2',
            'duration' => 10
        ]);
        DB::table('Recipes')->insert([
            'name' => 'Receta 3',
            'duration' => 15
        ]);
        DB::table('Recipes')->insert([
            'name' => 'Receta 4',
            'duration' => 20
        ]);
        DB::table('Recipes')->insert([
            'name' => 'Receta 5',
            'duration' => 25
        ]);
        DB::table('Recipes')->insert([
            'name' => 'Receta 6',
            'duration' => 30
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '1',
            'ingredient_id' => '1',
           'quantity' => 2
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '1',
            'ingredient_id' => '2',
            'quantity' => 3
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '2',
            'ingredient_id' => '3',
            'quantity' => 2
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '2',
            'ingredient_id' => '4',
            'quantity' => 3
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '3',
            'ingredient_id' => '5',
            'quantity' => 2
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '3',
            'ingredient_id' => '6',
            'quantity' => 3
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '4',
            'ingredient_id' => '7',
            'quantity' => 2
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '4',
            'ingredient_id' => '8',
            'quantity' => 3
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '5',
            'ingredient_id' => '9',
            'quantity' => 2
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '5',
            'ingredient_id' => '10',
            'quantity' => 3
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '6',
            'ingredient_id' => '1',
            'quantity' => 2
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '6',
            'ingredient_id' => '2',
            'quantity' => 1
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '6',
            'ingredient_id' => '5',
            'quantity' => 2
        ]);
        DB::table('RecipesxIngredients')->insert([
            'recipe_id' => '6',
            'ingredient_id' => '8',
            'quantity' => 1
        ]);
    }
}
