<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'phone', 'email', 'image', 'admin_created_at', 'admin_updated_at',
    ];

}
