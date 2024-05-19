<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Post
 *
 * @mixin Eloquent
 */
class OrdersxRecipes extends Model
{
    use HasFactory;
    protected $table = 'OrdersxRecipes';
    protected $fillable = [
        'recipe_id',
        'order_id',
        'quantity'
    ];
    public $timestamps = false;
}
