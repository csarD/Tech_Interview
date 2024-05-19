<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Post
 *
 * @mixin Eloquent
 */
class RecipesxIngredients extends Model
{
    use HasFactory;
    protected $table = 'RecipesXIngredients';
    protected $fillable = [
        'recipe_id',
        'ingredient_id',
        'quantity',
    ];
    public $timestamps = false;
}
