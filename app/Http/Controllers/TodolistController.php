<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TodolistController extends Controller
{
    //
    public function index(Request $request){
        $data = DB::table('todo_lists')->select(['body','head','seq'])->get();
        return compact("data");
    }

    public function create(Request $request){

        $data = DB::table('todo_lists')->insert([
            "body"=>$request->body_list,
            "head"=>$request->head_list
        ]);


        $resp = ["msg"=>""];
        if($data){
            $resp["msg"] = "upload done";
        }
        else{
            $resp["msg"] = "upload fail";
        }
        return  compact('resp');
    }


    public function update(Request $request){
        $data = DB::table('todo_lists')->where('seq',$request->id)->update([
            "body"=>$request->body_list,
            "head"=>$request->head_list
        ]);
        $resp = ["msg"=>""];
        if($data){
            $resp["msg"] = "update done";
        }
        else{
            $resp["msg"] = "update fail";
        }
        return  compact('resp');
    }

    public function delete(Request $request){
        $data = DB::table('todo_lists')->where('seq',$request->id)->delete();
        $resp = ["msg"=>""];
        if($data){
            $resp["msg"] = "delete done";
        }
        else{
            $resp["msg"] = "delete fail";
        }
        return  compact('resp');
    }

}
