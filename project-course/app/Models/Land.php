<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $table = 'land';

    /**
     * Get all image for this build
     */

    public function images()
    {
        return $this->hasMany(LandImage::class);
    }
}
