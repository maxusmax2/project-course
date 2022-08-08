<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Commercial;
use App\Models\Cottage;
use App\Models\Land;

use App\Models\Room;
use Illuminate\Support\Facades\Cache;


class DetailController extends Controller
{
    private $cacheTime = 360;
    /**
     * return JSON with detail build,and image
     * attribute buildType and id build
     */
    public function getDetail(string $buildType, int  $id){

        switch ($buildType){

            case 'rooms':

                if(Cache::tags($buildType)->has($id)){
                    return Cache::tags($buildType)->get($id);
                }

                $buildObject = Room::find($id);
                $buildImages = $buildObject
                    ->join('room_images','rooms.id','=','room_images.build_id')
                    ->select('room_images.image_name')
                    ->get();
                $responce = $this->packDetailResponce($buildObject->get(),$buildImages);

                Cache::tags($buildType)->put($id,$responce,$this->cacheTime);
                return $responce;

            case 'apartments':

                if(Cache::tags($buildType)->has($id)){
                    return Cache::tags($buildType)->get($id);
                }

                $buildObject = Apartment::find($id);
                $buildImages = $buildObject
                    ->join('apartment_images','apartments.id','=','apartment_images.build_id')
                    ->select('apartment_images.image_name')
                    ->get();
                $responce = $this->packDetailResponce($buildObject->get(),$buildImages);

                Cache::tags($buildType)->put($id,$responce,$this->cacheTime);
                return $responce;

            case 'land':

                if(Cache::tags($buildType)->has($id)){
                    return Cache::tags($buildType)->get($id);
                }

                $buildObject = Land::find($id);
                $buildImages = $buildObject
                    ->join('land_images','lands.id','=','land_images.build_id')
                    ->select('land_images.image_name')
                    ->get();
                $responce = $this->packDetailResponce($buildObject->get(),$buildImages);

                Cache::tags($buildType)->put($id,$responce,$this->cacheTime);
                return $responce;

            case 'cottage':

                if(Cache::tags($buildType)->has($id)){
                    return Cache::tags($buildType)->get($id);
                }

                $buildObject = Cottage::find($id);
                $buildImages = $buildObject
                    ->join('cottage_images','cottages.id','=','cottage_images.build_id')
                    ->select('cottage_images.image_name')
                    ->get();
                $responce = $this->packDetailResponce($buildObject->get(),$buildImages);

                Cache::tags($buildType)->put($id,$responce,$this->cacheTime);
                return $responce;

            case 'commercial':

                if(Cache::tags($buildType)->has($id)){
                    return Cache::tags($buildType)->get($id);
                }

                $buildObject = Commercial::find($id);
                $buildImages = $buildObject
                    ->join('commercial_images','commercials.id','=','commercial_images.build_id')
                    ->select('commercial_images.image_name')
                    ->get();
                $responce = $this->packDetailResponce($buildObject->get(),$buildImages);

                Cache::tags($buildType)->put($id,$responce,$this->cacheTime);
                return $responce;
            default:
                return redirect('/catalog');

        }
    }

    private function packDetailResponce($buildInfo, $images){
        return ['buildInfo'=>$buildInfo,'images'=>$images];
    }
}
