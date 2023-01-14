<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoppingchart extends Model
{
    use HasFactory;

    protected $fillable =[
        'identifier',
        'instance',
        'content',
        'created_at',
        'updated_at'
    ];

    protected $table = 'shoppingcart';
}
