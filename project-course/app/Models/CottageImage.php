<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CottageImage extends Model
{
    use HasFactory;
    protected $casts = [
        'tags' => 'json',
    ];
}
