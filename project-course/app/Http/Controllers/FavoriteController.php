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
    public function getFavorite(Request $request){

        $Response = [];

        $builds = FavoriteBuild::
            where('user_token',$request->user()->token()->id)
            ->get();

        foreach($builds as $build){

            $buildObject = DB::table($build->build_type)->find($build->build_id);
            $buildImages = $this->getImageBuild(DB::table($build->build_type),$build->build_type);
            $Response[] = $this->buildResponse($buildObject,$buildImages);
        }

        return $Response;
    }

    public function appendFavorite(Request $request,$buildType,$id){
        $build = new FavoriteBuild;

        $build->build_type = $buildType;
        $build->build_id = $id;
        $build->user_token =  $request->user()->token()->id;

        $build->save();

    }

    public function deleteFavorite(Request $request,$buildType,$id){
        FavoriteBuild::
            where('build_type',$buildType)
            ->where('build_id',$id)
            ->where('user_token',$request->user()->token()->id)
            ->delete();
    }


}
