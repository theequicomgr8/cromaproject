<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessories;
use File;
class AccessoriesController extends Controller
{
    public function save(Request $request){
        $data=new Accessories;
        if($file=$request->has('pic')){
            $file=$request->file('pic');
            $filename=time()."-".$file->getClientOriginalName();
            $file->move(public_path('asset/accessories'),$filename);
        }

        $data->name=$request->input('name');
        if(!empty($filename)){
            $data->pic=$filename;
        }
        $data=$data->save();

        

        //$name="resources/views/".$request->input('name')."blade.php";
        //fopen("$fileName", "w");
        if($data){
            return back()->with('msg',"Accessories Add Successfully");
        }else{
            return back()->with('err_msg',"Some Error In Add Add Accessories");
        }
    }
}
