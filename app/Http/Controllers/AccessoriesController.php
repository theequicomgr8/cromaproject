<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessories;
use File;

use App\Models\Laptop;
use App\Models\Assign;
use App\Models\Employee;
use App\Models\Asset;
use DB;

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



    //ram start
    public function ram(){
        $total=Laptop::where('system_type','1')->count();
        $used=Assign::distinct('item_id')->count();
        
        return view('ram',compact('total','used'));
    }

    public function getram(Request $request){
        $columns=[
            0=>"id",
            1=>"brand",
            2=>"configuration",
            3=>"serial_no",
            4=>"status",
            5=>"assign",
            6=>"warranty_end",
            7=>"action",
        ];


        $recordsTotal=Asset::where('accessories_type','1')->count();
        $recordsFiltered=$recordsTotal;
        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');

        if(!empty($request->input('search.value'))){

        }else{
            $record=Asset::where('deletes','0')
                    ->where('accessories_type','1')
                    ->limit($limit)
                    ->get();    
        }
        $data=[];
        if(!empty($record)){
            foreach($record as $value){
                $assign=Assign::where('item_id',$value->id)->where('type','3')->first()->assign;
                $assignname=Employee::where('id',$assign)->first()->name;
                $action="<ul>
                <li class='apporive-bgcheck'>
                <a><img src='".basepath('images/table-image/edit-icon.svg')."'></a>
                </li>
                <li class='red-bgmessage' title='Your Message Here'>
                <a data-bs-toggle='modal' class='assignclick' data-id='".$value->id."' data-type='3' data-heading='Ram Assign' data-bs-target='#assign_device_popup'>
                <img src='".basepath('images/table-image/admin.svg')."'>
                </a>
                </li> 
                <li>
                <a data-bs-toggle='modal' class='asso-assignhistory' data-id='".$value->id."' data-type='3' data-bs-target='#assign_device_histroy_popup'>
                <img src='".basepath('images/table-image/calander-icon.svg')."'>
                </a>
                </li>
                <li>
                <a class='devicedelete' data-id='".$value->id."'>
                <img src='".basepath('images/table-image/delete-icon.svg')."'>
                </a>
                </li>
                </ul>";



                $result['id']=$value->systemid;
                $result['brand']=$value->brand;
                $result['configuration']=$value->configuration;
                $result['serial_no']="<a href='/product-detail/$value->id'>".$value->serial_no."</a>";
                $result['status']=$value->status;
                $result['assign']=$assignname;//$value->assign;
                // $result['SSD']="";
                $result['warranty_end']=$value->warranty_end;
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



    //ram save
    public function ramSave(Request $request){
        $ramdata=Asset::where('accessories_type','1')->orderBy('id','desc')->first();
        
        if(empty($ramdata->$systemid)){
            $systemid="01";
        }else{
            $systemid=$ramdata->$systemid+1;
            if($systemid <10){
                $systemid="0".$systemid;
            }
        }
        //file device_pic,invoice_file
        if($file=$request->has('device_pic')){
            $file=$request->file('device_pic');
            $device_pic=time().'-'.$file->getClientOriginalName();
            $file->move(public_path('/ram'),$device_pic);
        }

        if($file1=$request->has('invoice_file')){
            $file1=$request->file('invoice_file');
            $invoice_file=time().'-'.$file1->getClientOriginalName();
            $file1->move(public_path('/ram'),$invoice_file);
        }

        $ram=new Asset;
        $ram->storage=$request->input('storage');
        $ram->systemid=$systemid;
        $ram->brand=$request->input('brand');
        $ram->configuration=$request->input('configuration');
        $ram->serial_no=$request->input('serial_no');
        $ram->status=$request->input('status');
        $ram->warranty_end=$request->input('warranty_end');

        $ram->invoice_no=$request->input('invoice_no');
        $ram->invoice_date=$request->input('invoice_date');
        $ram->invoice_company_name=$request->input('invoice_company_name');

        $ram->accessoriesName="Ram";
        $ram->accessoriesCategory="Accessories";

        $ram->device_pic=$device_pic ?? '';
        $ram->invoice_file=$invoice_file ?? '';
        $ram->accessories_type='1';
        //$ram->system_type='1';
        $ram=$ram->save();
        if($ram){
            $ram_data=Asset::orderBy('id','desc')->first()->id;
            $assignIT=Employee::where('role','AdminIT')->where('status','1')->first()->id;
            $assign=new Assign;
            $assign->type="3";
            //$assign->ram=$request->input('ram');
            $assign->item_id=$ram_data;
            $assign->assign=$assignIT; //auto assign it admin
            $assign->assign_date=date('y-m-d');
            $assign=$assign->save();
            if($assign){
                return back()->with('msg',"Ram Add Successfully");
            }else{
                return back()->with('err_msg',"Some Error");
            }
            
        }else{
            return back()->with('err_msg',"Some Error in Ram Add");
        }
    }


    //ram assign
    public function ramAssign(Request $request){
        //dd($request->input('empcode'));
        $empid=Employee::where('empcode',$request->input('empcode'))->first()->id;
        //dd($empid);
        $assign=new Assign;
        $assign->type="3";
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
        $data->join('ram','ram.id','=','assign_table.item_id');
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
    //ram end



    public function productDetail($id){
        //$data=Asset::where('id',$id)->first();
        $data=DB::table('ram');
        $data->select('ram.*','employee.name as empname');
        $data->join('assign_table','assign_table.item_id','=','ram.id');
        $data->join('employee','employee.id','=','assign_table.assign');
        $data->where('assign_table.type','3');
        $data->where('ram.accessories_type','1');
        $data->orderBy('id','desc');
        $data=$data->get();


        return view('product-detail',compact('data'));
    }


}
