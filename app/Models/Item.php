<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'SKU', 
        'price', 
        'image', 
        'admin_created_at', 
        'admin_updated_at', 
        'measure_id',
    ];

}
