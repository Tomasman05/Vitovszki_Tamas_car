<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function getCars(){
        $cars= DB::table("car")
        ->select(
            "car.id as Id",
            "car.name as Márka",
            "car.amount as Mennyiség",
            "type.type as Típus",
            "color.color as Szín"
        )
        ->join("color","car.color_id","=","color.id")
        ->join("type","car.type_id","=","type.id")
        ->get();
        return $cars;
    }
    public function getOneCar($carName){
        $cars= DB::table("car")
        ->select(
            "car.id as Id",
            "car.name as Márka",
            "car.amount as Mennyiség",
            "type.type as Típus",
            "color.color as Szín"
        )
        ->join("color","car.color_id","=","color.id")
        ->join("type","car.type_id","=","type.id")
        ->where("name",$carName)
        ->get();
        return $cars;
    }
    public function addCar(Request $request){
        DB::table("car")->insert([
            "name"=>$request->input("name"),
            "amount"=>$request->input("amount"),
            "type_id"=>$request->input("type_id"),
            "color_id"=>$request->input("color_id"),
        ]);
    }
    public function addColor(Request $request){
        DB::table("color")->insert([
            "color"=>$request->input("color")
        ]);
    }
    public function addType(Request $request){
        DB::table("type")->insert([
            "type"=>$request->input("type")
        ]);
    }

    public function modifyCar(Request $request , $id){
        DB::table("car")->where("id",$id)->update([
            "name"=>$request->input("name"),
            "amount"=>$request->input("amount"),
            "type_id"=>$request->input("type_id"),
            "color_id"=>$request->input("color_id"),
        ]);
    }

    public function deleteCar($id){
        DB::table("car")->where("id",$id)->delete();
    }
}
