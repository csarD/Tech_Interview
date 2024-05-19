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
class Recipes extends Model
{
    use HasFactory;
    protected $table = 'Recipes';
    protected $fillable = [
        'name',
        'duration',
        'id',
    ];
    public $timestamps = false;
}
