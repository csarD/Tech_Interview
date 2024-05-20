<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Post
 *
 * @mixin Eloquent
 */
class Order extends Model
{
    use HasFactory;
    protected $table = 'Orders';
    protected $fillable = [
        'Status','id'
    ];
    /**
     * Get the phone associated with the user.
     */
    public function recipes(): MorphMany
    {
        return $this->morphMany(OrdersxRecipes::class, 'OrderRecipe');
    }
}
