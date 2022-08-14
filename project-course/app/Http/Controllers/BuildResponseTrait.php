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

    private function getImageBuild($buildObject,$buildType,$id):array
    {
        $buildImages = $buildObject
            ->join("images","images.build_id",'=',$buildType.".id")
            ->where("images.build_id",'=',$id)
            ->where("images.build_type",'=',$buildType)
            ->select("images.image_name")
            ->get();

        $imageResponse = [];
        foreach($buildImages as $imageName)
        {
            $imageResponse[] = Storage::url($imageName->image_name);
        }

        return $imageResponse;
    }

}
