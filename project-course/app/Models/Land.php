<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    /**
     * Get all image for this build
     */
    protected $table = 'land';
    public function images()
    {
        return $this->hasMany(LandImage::class);
    }
}
