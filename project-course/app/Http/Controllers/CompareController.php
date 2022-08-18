<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CompareBuild;
use Illuminate\Support\Facades\DB;

class CompareController extends Controller
{
    use BuildResponseTrait;
    //Получение объектов для сравнения
    public function getCompare(Request $request):array
    {
        $Response = [];
        // Получение объектов для определенного пользователя по его токену пользователя
        $builds = CompareBuild::
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
    //Добавление в сравнения
    public function appendCompare(Request $request, string  $buildType, int $id)
    {
        $build = new CompareBuild;

        $build->build_type = $buildType;
        $build->build_id = $id;
        $build->user_token =  $request->user()->token()->id;

        $build->save();
    }
    //Удаление из сравнения
    public function deleteCompare(Request $request, string $buildType, int $id)
    {
        CompareBuild::
            where('build_type',$buildType)
            ->where('build_id',$id)
            ->where('user_token',$request->user()->token()->id)
            ->delete();
    }
}
