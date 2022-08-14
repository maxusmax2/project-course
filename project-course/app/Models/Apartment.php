<?php

namespace App\Models;

use Database\Factories\ApartmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

     /**
     * Get all image for this build
     */
    public function images()
    {
        return $this->hasMany(ApartmentImage::class);
    }

    protected static function newFactory()
    {
        return ApartmentFactory::new();
    }
}
