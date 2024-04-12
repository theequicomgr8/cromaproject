<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Assign;
use App\Models\Employee;
use DB;
class DeviceController extends Controller
{
    public function laptop(){
        $total=Laptop::where('system_type','1')->count();
        $used=Assign::distinct('item_id')->count();
        
        return view('laptop',compact('total','used'));
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


        $recordsTotal=Laptop::where('system_type','1')->count();
        $recordsFiltered=$recordsTotal;
        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');

        if(!empty($request->input('search.value'))){

        }else{
            $record=laptop::where('deletes','0')
                    ->where('system_type','1')
                    ->limit($limit)
                    ->get();    
        }
        $data=[];
        if(!empty($record)){
            foreach($record as $value){
                $assign=Assign::where('item_id',$value->id)->where('type','1')->first();

                $action="<ul>
                <li class='apporive-bgcheck'>
                <a><img src='".basepath('images/table-image/edit-icon.svg')."'></a>
                </li>
                <li class='red-bgmessage' title='Your Message Here'>
                <a data-bs-toggle='modal' class='assignclick' data-id='".$value->id."' data-bs-target='#assign_device_popup'>
                <img src='".basepath('images/table-image/admin.svg')."'>
                </a>
                </li>
                <li>
                <a data-bs-toggle='modal' class='laptopassignhistory' data-id='".$value->id."' data-type='1' data-bs-target='#assign_device_histroy_popup'>
                <img src='".basepath('images/table-image/calander-icon.svg')."'>
                </a>
                </li>
                <li>
                <a class='devicedelete' data-id='".$value->id."'>
                <img src='".basepath('images/table-image/delete-icon.svg')."'>
                </a>
                </li>
                </ul>";



                $result['id']=$value->id;
                $result['systemid']="L-".$value->systemid."-R1";
                $result['brand']=$value->brand;
                $result['ram']=$assign->ram;
                $result['processor']=$value->processor;
                $result['HDD']=$value->hdd;
                // $result['SSD']="";
                $result['status']=$value->status;
                $result['action']=$action;

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
        $laptop->system_type='1';
        $laptop=$laptop->save();
        if($laptop){
            $laptopdata=Laptop::where('system_type','1')->orderBy('id','desc')->first()->id;
            $assignIT=Employee::where('role','AdminIT')->where('status','1')->first()->id;
            $assign=new Assign;
            $assign->type="1";
            $assign->ram=$request->input('ram');
            $assign->item_id=$laptopdata;
            $assign->assign=$assignIT; //auto assign it admin
            $assign->assign_date=date('y-m-d');
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


    //laptop assign
    public function laptopAssign(Request $request){
        //dd($request->input('empcode'));
        $empid=Employee::where('empcode',$request->input('empcode'))->first()->id;
        //dd($empid);
        $assign=new Assign;
        $assign->type="1";
        $assign->item_id=$request->input('deviceid');
        $assign->assign=$empid;
        $assign->assign_date=$request->input('assign_date');
        $assign=$assign->save();
        if($assign){
            return back()->with('msg',"Assign Successfully");
        }else{
            return back()->with('err_msg',"Not Assign");
        }
    }

    //assign history 
    public function assignhistory(Request $request){
        $id=$request->input('id');
        $type=$request->input('type');
        //$data=Assign::where('type',$type)->where('item_id',$id)->get();
        $data=DB::table('assign_table');
        $data->select('employee.name as empname','assign_table.assign_date as assigndate');
        $data->join('laptop','laptop.id','=','assign_table.item_id');
        $data->join('employee','employee.id','=','assign_table.assign');
        $data->where('assign_table.type',$type);
        $data->where('assign_table.item_id',$id);
        $data->orderBy('assign_table.aid','desc');
        $data=$data->get();
        if($data){
            return response()->json(["status"=>true,"result"=>$data]);
        }else{
            return response()->json(["status"=>false,"message"=>"Some Error"]);
        }

    }





    //desktop start
    public function desktop(){
        $total=Laptop::where('system_type','2')->count();
        $used=Assign::distinct('item_id')->where('type','2')->count();
        
        return view('desktop',compact('total','used'));
    }

    public function getdesktop(Request $request){
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

        
        $recordsTotal=Laptop::where('system_type','2')->count();
        $recordsFiltered=$recordsTotal;
        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');

        if(!empty($request->input('search.value'))){

        }else{
            $record=laptop::where('deletes','0')
                    ->where('system_type','2')
                    ->limit($limit)
                    ->get();    
        }
        $data=[];
        if(!empty($record)){
            foreach($record as $value){
                $assign=Assign::where('item_id',$value->id)->where('type','2')->first();

                $action="<ul>
                <li class='apporive-bgcheck'>
                <a><img src='".basepath('images/table-image/edit-icon.svg')."'></a>
                </li>
                <li class='red-bgmessage' title='Your Message Here'>
                <a data-bs-toggle='modal' class='assignclick' data-id='".$value->id."' data-bs-target='#assign_device_popup'>
                <img src='".basepath('images/table-image/admin.svg')."'>
                </a>
                </li>
                <li>
                <a data-bs-toggle='modal' class='laptopassignhistory' data-id='".$value->id."' data-type='2' data-bs-target='#assign_device_histroy_popup'>
                <img src='".basepath('images/table-image/calander-icon.svg')."'>
                </a>
                </li>
                <li>
                <a class='devicedelete' data-id='".$value->id."'>
                <img src='".basepath('images/table-image/delete-icon.svg')."'>
                </a>
                </li>
                </ul>";



                $result['id']=$value->id;
                $result['systemid']="L-".$value->systemid."-R1";
                $result['brand']=$value->brand;
                $result['ram']=$assign->ram;
                $result['processor']=$value->processor;
                $result['HDD']=$value->hdd;
                // $result['SSD']="";
                $result['status']=$value->status;
                $result['action']=$action;

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



    //desktop save
    public function desktopSave(Request $request){
        $laptopdata=Laptop::where('system_type','2')->orderBy('id','desc')->first();
        
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
        $laptop->system_type='2';
        $laptop=$laptop->save();
        if($laptop){
            $laptopdata=Laptop::orderBy('id','desc')->first()->id;
            $assignIT=Employee::where('role','AdminIT')->where('status','1')->first()->id;
            $assign=new Assign;
            $assign->type="2";
            $assign->ram=$request->input('ram');
            $assign->item_id=$laptopdata;
            $assign->assign=$assignIT; //auto assign it admin
            $assign->assign_date=date('y-m-d');
            $assign=$assign->save();
            if($assign){
                return back()->with('msg',"Desktop Add Successfully");
            }else{
                return back()->with('err_msg',"Some Error");
            }
            
        }else{
            return back()->with('err_msg',"Some Error in Desktop Add");
        }
    }


    //desktop assign
    public function desktopAssign(Request $request){
        //dd($request->input('empcode'));
        $empid=Employee::where('empcode',$request->input('empcode'))->first()->id;
        //dd($empid);
        $assign=new Assign;
        $assign->type="2";
        $assign->item_id=$request->input('deviceid');
        $assign->assign=$empid;
        $assign->assign_date=$request->input('assign_date');
        $assign=$assign->save();
        if($assign){
            return back()->with('msg',"Assign Successfully");
        }else{
            return back()->with('err_msg',"Not Assign");
        }
    }

    //assign history 
    /*public function assignhistory(Request $request){
        $id=$request->input('id');
        $type=$request->input('type');
        //$data=Assign::where('type',$type)->where('item_id',$id)->get();
        $data=DB::table('assign_table');
        $data->select('employee.name as empname','assign_table.assign_date as assigndate');
        $data->join('laptop','laptop.id','=','assign_table.item_id');
        $data->join('employee','employee.id','=','assign_table.assign');
        $data->where('assign_table.type',$type);
        $data->where('assign_table.item_id',$id);
        $data->orderBy('assign_table.aid','desc');
        $data=$data->get();
        if($data){
            return response()->json(["status"=>true,"result"=>$data]);
        }else{
            return response()->json(["status"=>false,"message"=>"Some Error"]);
        }

    }*/

    //desktop end






    //device delete
    public function devicedelete(Request $request){
        $id=$request->input('id');
        dd($id);
        $data=Laptop::where('id',$id)->update(["deletes"=>1]);
        if($data){
            $asigndata=Assign::where('item_id',$id)->delete();
            if($asigndata){
                return response()->json(["status"=>true,"Message"=>"Delete Successfully"]);
            }
        }else{
            return response()->json(["status"=>false,"Message"=>"Some Error"]);
        }
    }
}
