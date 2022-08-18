<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    use BuildResponseTrait;

    private $cacheTime = 360;

    /**
     * return JSON with detail build,and image
     * attribute buildType and id build
     */
    public function getDetail(string $buildType, int  $id)
    {
        if(Cache::tags($buildType)->has($id)){
            return Cache::tags($buildType)->get($id);
        }

        $buildObject = DB::table($buildType)->find($id);
        $imageResponse = $this->getImageBuild(DB::table($buildType),$buildType,$id);
        $response = $this->buildResponse($buildObject,$imageResponse);

        Cache::tags($buildType)->put($id,$response,$this->cacheTime);

        return $response;
    }
}
