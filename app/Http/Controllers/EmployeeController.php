<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function getemp(Request $request){
        $result=$request->input('result');
        $data=Employee::where('status','1')
                      ->where('name','LIKE','%'.$result.'%')
                      ->orWhere('empcode','LIKE','%'.$result.'%')
                      ->get();
        if($data){
            return response()->json(["status"=>true,"result"=>$data]);
        }else{
            return response()->json(["status"=>false,"message"=>"Not Found"]);
        }
    }
}
