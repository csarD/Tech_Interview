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
class Order extends Model
{
    use HasFactory;
    protected $table = 'Orders';
    protected $fillable = [
        'Status','id'
    ];
}
