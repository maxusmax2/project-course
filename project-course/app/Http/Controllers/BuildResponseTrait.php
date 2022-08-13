<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait BuildResponseTrait
{
    private function buildResponse($buildInfo,$buildImages)
    {
        return ['buildInfo'=>$buildInfo,'images'=>$buildImages];
    }

    private function getImageBuild($buildObject,$buildType):array
    {
        $buildImages = $buildObject
            ->join("{$buildType}_images","{$buildType}.id",'=',"{$buildType}_images.build_id")
            ->select("{$buildType}_images.image_name")
            ->get();

        $imageResponse = [];
        foreach($buildImages as $imageName)
        {
            $imageResponse[] = Storage::url($imageName->image_name);
        }

        return $imageResponse;
    }

}
