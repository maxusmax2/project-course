<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CompareBuild;
use App\Models\Apartment;
use App\Models\Commercial;
use App\Models\Cottage;
use App\Models\Land;
use App\Models\Room;


class CompareController extends Controller
{
    public function getCompare(Request $request){
        $builds = CompareBuild::
            where('user_token',$request->user()->token()->id)
            ->get();
        $Response = [];
        foreach($builds as $build){
        switch ($build->build_type){
            case 'rooms':
                $buildObject = Room::find($build->build_id);
                $buildImages = $buildObject
                    ->join('room_images','rooms.id','=','room_images.build_id')
                    ->select('room_images.image_name')
                    ->get();
                    $Response[] = $this->packFavoriteBuild($buildObject,$buildImages);
                break;

            case 'apartments':

                $buildObject = Apartment::find($build->build_id);
                $buildImages = $buildObject
                    ->join('apartment_images','apartments.id','=','apartment_images.build_id')
                    ->select('apartment_images.image_name')
                    ->get();
                    $Response[] = $this->packFavoriteBuild($buildObject,$buildImages);
                break;

            case 'land':

                $buildObject = Land::find($build->build_id);
                $buildImages = $buildObject
                    ->join('land_images','lands.id','=','land_images.build_id')
                    ->select('land_images.image_name')
                    ->get();
                    $Response[] = $this->packFavoriteBuild($buildObject,$buildImages);
                break;

            case 'cottage':

                $buildObject = Cottage::find($build->build_id);
                $buildImages = $buildObject
                    ->join('cottage_images','cottages.id','=','cottage_images.build_id')
                    ->select('cottage_images.image_name')
                    ->get();
                    $Response[] = $this->packFavoriteBuild($buildObject,$buildImages);
                break;

            case 'commercial':

                $buildObject = Commercial::find($build->build_id);
                $buildImages = $buildObject
                    ->join('commercial_images','commercials.id','=','commercial_images.build_id')
                    ->select('commercial_images.image_name')
                    ->get();
                    $Response[] = $this->packFavoriteBuild($buildObject,$buildImages);
                break;
        }
        }
        return $Response;
    }

    public function appendCompare(Request $request,$buildType,$id){
        $build = new CompareBuild;

        $build->build_type = $buildType;
        $build->build_id = $id;
        $build->user_token =  $request->user()->token()->id;

        $build->save();
    }

    public function deleteCompare(Request $request,$buildType,$id){
        CompareBuild::
            where('build_type',$buildType)
            ->where('build_id',$id)
            ->where('user_token',$request->user()->token()->id)
            ->delete();
    }

    private function packCompareBuild($buildInfo, $images){
        return ['buildInfo'=>$buildInfo,'images'=>$images];
    }
}
