<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteBuild;
use App\Models\Apartment;
use App\Models\Commercial;
use App\Models\Cottage;
use App\Models\Land;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FavoriteController extends Controller
{
    use BuildResponseTrait;
    //Получение объектов для Избранного
    public function getFavorite(Request $request)
    {
        $Response = [];
        // Получение объектов для определенного пользователя по его токену пользователя
        $builds = FavoriteBuild::
            where('user_token',$request->user()->token()->id)
            ->get();

        //Сборка всех объектов и их фото вместе
        foreach($builds as $build){

            $buildObject = DB::table($build->build_type)->find($build->build_id);
            $buildImages = $this->getImageBuild(DB::table($build->build_type),$build->build_type,$build->build_id);
            $Response[] = $this->buildResponse($buildObject,$buildImages);
        }

        return $Response;
    }
    //Добавление в избранное
    public function appendFavorite(Request $request, string $buildType, int $id)
    {
        $build = new FavoriteBuild;

        $build->build_type = $buildType;
        $build->build_id = $id;
        $build->user_token =  $request->user()->token()->id;

        $build->save();
    }

    //Удаления из избранного
    public function deleteFavorite(Request $request,string $buildType, int $id)
    {
        FavoriteBuild::
            where('build_type',$buildType)
            ->where('build_id',$id)
            ->where('user_token',$request->user()->token()->id)
            ->delete();
    }

}
