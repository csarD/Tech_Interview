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
class Ingredient extends Model
{
    use HasFactory;
    protected $table = 'Ingredients';
    protected $fillable = [
        'name',
        'id',
        'units',
    ];
    public $timestamps = false;
}
