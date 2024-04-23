<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Assign;
use App\Models\Employee;
use DB;
use Session;
class DeviceController extends Controller
{
    public function laptop(){
        $total=Laptop::where('system_type','1')->count();
        $used=Assign::distinct('item_id')->where('type',1)->where('assign','!=','2')->count();
        
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
            $search=$request->input('search.value');
            $record =  laptop::where('id','LIKE',"%{$search}%")
                        ->orWhere('brand', 'LIKE',"%{$search}%")
                        ->orWhere('processor', 'LIKE',"%{$search}%")
                        ->orWhere('ram', 'LIKE',"%{$search}%")
                        ->where('system_type','1')
                        ->where('deletes','0')
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();  
        }else{
            $record=laptop::where('deletes','0')
                    ->where('system_type','1')
                    ->limit($limit)
                    ->get();    
        }
        $data=[];
        if(!empty($record)){
            foreach($record as $key => $value){
                $assign=Assign::where('item_id',$value->id)->where('type','1')->first();

                $action="<ul>
                <li class='apporive-bgcheck'>
                <a class='deviceedit' data-id='".$value->id."' data-brand='".$value->brand."' data-processor='".$value->processor."' data-ram='".$value->ram."' data-hdd='".$value->hdd."' data-ssd='".$value->ssd."' data-status='".$value->status."'  data-bs-target='#edit_device_name_model'><img src='".basepath('images/table-image/edit-icon.svg')."' ></a>
                </li>
                <li class='red-bgmessage' title='Your Message Here'>
                <a data-bs-toggle='modal' class='assignclick' data-id='".$value->id."' data-type='1' data-heading='Laptop Assign' data-bs-target='#assign_device_popup'>
                <img src='".basepath('images/table-image/admin.svg')."'>
                </a>
                </li>
                <li>
                <a data-bs-toggle='modal' class='laptopassignhistory' data-id='".$value->id."' data-type='1' data-heading='Laptop Assign' data-bs-target='#assign_device_histroy_popup'>
                <img src='".basepath('images/table-image/calander-icon.svg')."'>
                </a>
                </li>
                <li>
                <a class='devicedelete' data-id='".$value->id."'>
                <img src='".basepath('images/table-image/delete-icon.svg')."'>
                </a>
                </li>
                </ul>";



                $result['id']=$key+1;//$value->id;
                $result['systemid']="<a href='/device-product-detail/$value->id/1/1'>"."L-".$value->systemid."-R1"."</a>"; //"L-".$value->systemid."-R1"; //url/id/accessories_type/type
                $result['brand']=$value->brand;
                $result['ram']=$value->ram;//$assign->ram;
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
        $laptopdata=Laptop::orderBy('id','desc')->where('system_type','1')->first();
        
        if(empty($laptopdata->systemid)){
            $systemid="01";
        }else{
            $systemid=$laptopdata->systemid+1;
            if($systemid < 10){
                $systemid="0".$systemid;
            }
        }
        $laptop=new Laptop;
        $laptop->brand=$request->input('brand');
        $laptop->systemid=$systemid;
        $laptop->hdd=$request->input('hdd');
        $laptop->ssd=$request->input('ssd');
        $laptop->processor=$request->input('processor');
        $laptop->status=$request->input('status');
        $laptop->ram=$request->input('ram');
        $laptop->system_type='1';
        $laptop=$laptop->save();
        if($laptop){
            $laptopdata=Laptop::where('system_type','1')->orderBy('id','desc')->first()->id;
            $assignIT=Employee::where('role','AdminIT')->where('status','1')->first()->id;
            $assign=new Assign;
            $assign->type="1";
            //$assign->ram=$request->input('ram');
            $assign->item_id=$laptopdata;
            $assign->assign=Session::get('Auth_id');//$assignIT; //auto assign it admin
            $assign->assign_by=Session::get('Auth_name');
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
        $assign->type=$request->input('type') ?? "1";
        $assign->item_id=$request->input('deviceid');
        $assign->assign=$empid;
        $assign->assign_by=Session::get('Auth_name');
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
        $data->select('employee.name as empname','assign_table.assign_date as assigndate','assign_table.assign_by as assign_by');
        $data->join('laptop','laptop.id','=','assign_table.item_id');
        $data->join('employee','employee.id','=','assign_table.assign');
        //$data->join('employee as e','e.id','=','assign_table.assign_by');
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
        //$used=Assign::distinct('item_id')->where('type','2')->count();
        $used=Assign::distinct('item_id')->where('type',2)->where('assign','!=','2')->count();
        
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
            $search=$request->input('search.value');
            $record =  laptop::where('id','LIKE',"%{$search}%")
                        ->orWhere('brand', 'LIKE',"%{$search}%")
                        ->orWhere('processor', 'LIKE',"%{$search}%")
                        ->orWhere('ram', 'LIKE',"%{$search}%")
                        ->where('system_type','2')
                        ->where('deletes','0')
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
        }else{
            $record=laptop::where('deletes','0')
                    ->where('system_type','2')
                    ->limit($limit)
                    ->get();    
        }
        $data=[];
        if(!empty($record)){
            foreach($record as $key => $value){
                $assign=Assign::where('item_id',$value->id)->where('type','2')->first();

                $action="<ul>
                <li class='apporive-bgcheck'>
                <a class='deviceedit' data-id='".$value->id."' data-brand='".$value->brand."' data-processor='".$value->processor."' data-ram='".$value->ram."' data-hdd='".$value->hdd."' data-ssd='".$value->ssd."' data-status='".$value->status."'  data-bs-target='#edit_device_name_model' ><img src='".basepath('images/table-image/edit-icon.svg')."'></a>
                </li>
                <li class='red-bgmessage' title='Your Message Here'>
                <a data-bs-toggle='modal' class='assignclick' data-id='".$value->id."' data-type='2' data-heading='Desktop Assign' data-bs-target='#assign_device_popup'>
                <img src='".basepath('images/table-image/admin.svg')."'>
                </a>
                </li>
                <li>
                <a data-bs-toggle='modal' class='laptopassignhistory' data-id='".$value->id."' data-type='2' data-heading='Desktop Assign' data-bs-target='#assign_device_histroy_popup'>
                <img src='".basepath('images/table-image/calander-icon.svg')."'>
                </a>
                </li>
                <li>
                <a class='devicedelete' data-id='".$value->id."'>
                <img src='".basepath('images/table-image/delete-icon.svg')."'>
                </a>
                </li>
                </ul>";



                $result['id']=$key+1;
                $result['systemid']="<a href='/device-product-detail/$value->id/2/2'>"."L-".$value->systemid."-R1"."</a>"; //"L-".$value->systemid."-R1"; //url/id/accessories_type/type
                $result['brand']=$value->brand;
                $result['ram']=$value->ram;//$assign->ram;
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
        
        if(empty($laptopdata->systemid)){
            $systemid="01";
        }else{
            $systemid=$laptopdata->systemid+1;
            if($systemid <10){
                $systemid="0".$systemid;
            }
        }
        $laptop=new Laptop;
        $laptop->brand=$request->input('brand');
        $laptop->systemid=$systemid;
        $laptop->hdd=$request->input('hdd');
        $laptop->ssd=$request->input('ssd');
        $laptop->processor=$request->input('processor');
        $laptop->status=$request->input('status');
        $laptop->ram=$request->input('ram');
        $laptop->system_type='2';
        $laptop=$laptop->save();
        if($laptop){
            $laptopdata=Laptop::orderBy('id','desc')->first()->id;
            $assignIT=Employee::where('role','AdminIT')->where('status','1')->first()->id;
            $assign=new Assign;
            $assign->type="2";
            //$assign->ram=$request->input('ram');
            $assign->item_id=$laptopdata;
            $assign->assign=Session::get('Auth_id');//$assignIT; //auto assign it admin
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
        $assign->assign_by=Session::get('Auth_name');
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


    public function deviceUpdate(Request $request){
        $id=$request->input('id');
        $data=Laptop::find($id);
        $data->brand=$request->input('brand');
        $data->processor=$request->input('processor');
        $data->ram=$request->input('ram');
        $data->hdd=$request->input('hdd');
        $data->ssd=$request->input('ssd');
        $data->status=$request->input('status');
        $data=$data->save();
        if($data){
            return back()->with('msg',"Device Update Successfully");
        }else{
            return back()->with('err_msg',"Device Update Error");
        }
    }
    
    
    public function productDetail($id,$system_type,$type){
        //$data=Asset::where('id',$id)->first();
        $data=DB::table('laptop');
        $data->select('laptop.*','employee.name as empname');
        $data->join('assign_table','assign_table.item_id','=','laptop.id');
        $data->join('employee','employee.id','=','assign_table.assign');
        $data->where('assign_table.type',$type);
        $data->where('laptop.system_type',$system_type);
        $data->orderBy('id','desc');
        $data=$data->get();


        return view('product-detail',compact('data'));
    }
    
    
    
    public function getram(Request $request){
        $id=$request->input('id');
        $data=DB::table('custom_ram')->where('storage','!=',$id)->get();
        $output="";
        foreach($data as $value){
            $output.="<option>".$value->storage."</option>";
        }
        return $output;
        if($data){
            return response()->json(["msg"=>true,"result"=>$data]);
        }else{
            return response()->json(["msg"=>false,"message"=>"Some Error"]);
        }
    }
}
