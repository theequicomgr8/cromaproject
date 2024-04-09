<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Assign;
class DeviceController extends Controller
{
    public function laptop(){
        return view('laptop');
    }

    public function getlaptop(Request $request){
        $columns=[
            0=>"id",
            1=>"systemid",
            2=>"brand",
            3=>"ram",
            4=>"processor",
            // 5=>"HDD",
            // 6=>"SSD",
            // 7=>"status",
            // 8=>"action",
        ];


        $recordsTotal=Laptop::count();
        $recordsFiltered=$recordsTotal;
        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');

        if(!empty($request->input('search.value'))){

        }else{
            $record=laptop::where('deletes','0')
                    ->limit($limit)
                    ->get();    
        }
        $data=[];
        if(!empty($record)){
            foreach($record as $value){
                $assign=Assign::where('item_id',$value->id)->where('type','1')->first();
                $result['id']=$value->id;
                $result['systemid']="L-".$value->systemid."-R1";
                $result['brand']=$value->brand;
                $result['ram']=$assign->ram;
                $result['processor']=$value->processor;
                $result['HDD']=$value->hdd;
                // $result['SSD']="";
                $result['status']=$value->status;
                $result['action']="";

                $data[]=$result;
            }

        }
        $json_data=[
            "draw"=>intval($request->input('draw')),
            "recordsTotal"=>intval($recordsTotal),
            "recordsFiltered"=>intval($recordsFiltered),
            "data"=>$data
        ];

        return json_encode($json_data);


    }



    //laptop save
    public function laptopSave(Request $request){
        $laptopdata=Laptop::orderBy('id','desc')->first();
        
        if(empty($laptopdata->id)){
            $systemid="01";
        }else{
            $systemid=$laptopdata+1;
        }
        $laptop=new Laptop;
        $laptop->brand=$request->input('brand');
        $laptop->systemid=$systemid;
        $laptop->hdd=$request->input('hdd');
        $laptop->ssd=$request->input('ssd');
        $laptop->processor=$request->input('processor');
        $laptop->status=$request->input('status');
        $laptop=$laptop->save();
        if($laptop){
            $laptopdata=Laptop::orderBy('id','desc')->first()->id;
            $assign=new Assign;
            $assign->type="1";
            $assign->ram=$request->input('ram');
            $assign->item_id=$laptopdata;
            $assign->assign='1';
            $assign=$assign->save();
            if($assign){
                return back()->with('msg',"Laptop Add Successfully");
            }else{
                return back()->with('err_msg',"Some Error");
            }
            
        }else{
            return back()->with('err_msg',"Some Error in Laptop Add");
        }
    }
}
