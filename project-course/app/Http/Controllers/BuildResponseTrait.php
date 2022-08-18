<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait BuildResponseTrait
{
    //Сборка ответа о объекте с разделением на информацию об объекте и его фотографий
    private function buildResponse($buildInfo,$buildImages)
    {
        return ['buildInfo'=>$buildInfo,'images'=>$buildImages];
    }

    //Получение фото из базы данных для объекта
    private function getImageBuild($buildObject, string $buildType, int $id):array
    {
        //Получение названий всех фото к объекту
        $buildImages = $buildObject
            ->join("images","images.build_id",'=',$buildType.".id")
            ->where("images.build_id",'=',$id)
            ->where("images.build_type",'=',$buildType)
            ->select("images.image_name")
            ->get();

        $imageResponse = [];
        //Получение полного пути для фото
        foreach($buildImages as $imageName):array
        {
            $imageResponse[] = Storage::url($imageName->image_name);
        }

        return $imageResponse;
    }

}
