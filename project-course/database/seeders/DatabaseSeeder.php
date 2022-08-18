<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Apartment;
use App\Models\ApartmentImage;
use App\Models\Commercial;
use App\Models\CommercialImage;
use App\Models\CompareBuild;
use App\Models\Cottage;
use App\Models\CottageImage;
use App\Models\FavoriteBuild;
use App\Models\Image;
use App\Models\Land;
use App\Models\LandImage;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Заполнение всех таблиц объектов и их фото
        Cottage::factory()->count(200)->create();
        Commercial::factory()->count(200)->create();
        Land::factory()->count(200)->create();
        Room::factory()->count(200)->create();
        Apartment::factory()->count(150)->create();
        Image::factory()->count(200)->create();
        FavoriteBuild::factory()->count(150)->create();
        CompareBuild::factory()->count(150)->create();
    }
}
