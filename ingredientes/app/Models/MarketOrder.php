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
class MarketOrder extends Model
{
    use HasFactory;
    protected $table = 'OrdersMarket';
    protected $fillable = [
        'ingredient_id',

        'units',
        'added_at'
    ];
}
