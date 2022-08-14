<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
    use HasFactory;
    /**
     * Get all image for this build
     */
    protected $table = 'commercial';
    public function images()
    {
        return $this->hasMany(CommercialImage::class);
    }
}
