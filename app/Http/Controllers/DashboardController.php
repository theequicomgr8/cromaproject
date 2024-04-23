<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Accessories;
use Session;
class DashboardController extends Controller
{
    public function __construct()
    {
        $Authid=Session::get('Auth_id');
        $this->Authname=Session::get('Auth_name');
        $Authrole=Session::get('role');
    }
    public function index(){
        
        $data=Dashboard::all();
        $accessories=Accessories::all();
        return view('dashboard',compact('data','accessories'));
    }

    public function save(request $request){
        if($file=$request->has('pic')){
            $file=$request->file('pic');
            $filename=time()."-".$file->getClientOriginalName();
            $file->move(public_path('asset/device'),$filename);
        }
        $data=new Dashboard;
        $data->name=$request->input('name');
        if(!empty($filename)){
            $data->pic=$filename;
        }
        $data=$data->save();
        if($data){
            return back()->with('msg',"Device Add Successfully");
        }else{
            return back()->with('err_msg',"Some Error In Add Add Device");
        }
    }
}
