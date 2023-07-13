<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Classes;

class StudentsController extends Controller
{

    public function index()
    {
       $students = Students::select("students.*","classes.name as class_name")->leftJoin('classes','classes.id','=','students.student_class')->get();
       return view("index",["students"=>$students]);
    }

    public function add_show(Classes $classes)
    {
        $get_classes = $classes->select("*")->get();
        return view("create",["classes"=>$get_classes]);
    }

    public function add_logic(Request $request)
    {
        $input = ["student_name" => $request->name,
                  "student_class" => $request->class,
                  "student_age" => $request->age,
                  "student_gender" => $request->gender,];
        $is_exist = Students::select("*")->where($input)->get();
        if (count($is_exist) > 0) {
            echo json_encode(["result"=>"Same record already Exist!"]);
        }else{
            Students::insert($input);
            echo json_encode(["result"=>"success"]);
        }
    }


    public function edit_show($id)
    {
        if ($id === null || $id === "") {
           return redirect("/");
        }else{
           $get_classes = Classes::select("*")->get();
           $get_data = Students::select("*")->where("id","=",$id)->get()[0];
           return view("edit",["classes"=>$get_classes,"student"=>$get_data]);
        }

       
    }

    public function edit_logic(Request $request, $id)
    {
        $input = ["student_name" => $request->name,
                  "student_class" => $request->class,
                  "student_age" => $request->age,
                  "student_gender" => $request->gender,];
        $is_exist = Students::select("*")->where($input)->get();
        if (count($is_exist) > 0 && $is_exist[0]->id != $id) {
            echo json_encode(["result"=>"Same record already Exist!"]);
        }else{
            Students::where(["id"=>$id])->update($input);
            echo json_encode(["result"=>"success"]);
        }
    }

    public function delete(Request $request, $id)
    {
        Students::where(["id"=>$id])->delete();
        echo json_encode(["result"=>"success"]);
    }


}
