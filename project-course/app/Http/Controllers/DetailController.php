<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Commercial;
use App\Models\Cottage;
use App\Models\Land;

use App\Models\Room;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DetailController extends Controller
{
    use BuildResponseTrait;
    private $cacheTime = 360;

    /**
     * return JSON with detail build,and image
     * attribute buildType and id build
     */
    public function getDetail(string $buildType, int  $id){

        if(Cache::tags($buildType)->has($id)){
            return Cache::tags($buildType)->get($id);
        }

        $buildObject = DB::table($buildType)->find($id);
        $imageResponse = $this->getImageBuild(DB::table($buildType),$buildType);
        $response = $this->buildResponse($buildObject,$imageResponse);

        Cache::tags($buildType)->put($id,$response,$this->cacheTime);

        return $response;
    }
}
