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
use Session;

class MonitorController extends Controller
{
    



    //monitor start
    public function monitor(){
        //$total=Laptop::where('system_type','1')->count();
        //$used=Assign::distinct('item_id')->count();
        $total=Asset::where('accessories_type','6')->count();
        $used=Assign::distinct('item_id')->where('type',8)->where('assign','!=','2')->count();
        
        return view('monitor',compact('total','used'));
    }

    public function getmonitor(Request $request){
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


        $recordsTotal=Asset::where('accessories_type','6')->count();
        $recordsFiltered=$recordsTotal;
        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');

        if(!empty($request->input('search.value'))){
            $record =  Asset::where('id','LIKE',"%{$search}%")
                        ->orWhere('brand', 'LIKE',"%{$search}%")
                        ->where('accessories_type','6')
                        ->where('deletes','0')
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
        }else{
            $record=Asset::where('deletes','0')
                    ->where('accessories_type','6')
                    ->limit($limit)
                    ->get();    
        }
        $data=[];
        if(!empty($record)){
            foreach($record as $value){
                $assign=Assign::where('item_id',$value->id)->where('type','8')->first()->assign;
                $assignname=Employee::where('id',$assign)->first()->name;
                $action="<ul>
                <li class='apporive-bgcheck'>
                <a class='accessoriesedit' data-id='".$value->id."' data-brand='".$value->brand."' data-configuration='".$value->configuration."' data-serial_no='".$value->serial_no."' data-status='".$value->status."' data-warranty_end='".$value->warranty_end."' data-invoice_no='".$value->invoice_no."' data-invoice_date='".$value->invoice_date."' data-invoice_company_name='".$value->invoice_company_name."' ><img src='".basepath('images/table-image/edit-icon.svg')."'></a>
                </li>
                <li class='red-bgmessage' title='Your Message Here'>
                <a data-bs-toggle='modal' class='assignclick' data-id='".$value->id."' data-type='8' data-heading='monitor Assign' data-bs-target='#assign_device_popup'>
                <img src='".basepath('images/table-image/admin.svg')."'>
                </a>
                </li>
                <li>
                <a data-bs-toggle='modal' class='asso-assignhistory' data-id='".$value->id."' data-type='8' data-heading='monitor Assign' data-bs-target='#assign_device_histroy_popup'>
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
                $result['configuration']=$value->configuration; //url/id/accessories_type/type
                $result['serial_no']="<a href='/product-detail/$value->id/6/8'>".$value->serial_no."</a>";
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



    //monitor save
    public function monitorSave(Request $request){
        $monitordata=Asset::where('accessories_type','=','6')->orderBy('id','desc')->first();
        
        if(empty($monitordata->systemid)){
            $systemid="01";
        }else{
            $systemid=$monitordata->systemid+1;
            if($systemid <10){
                $systemid="0".$systemid;
            }
        }
        //dd($systemid);
        //file device_pic,invoice_file
        if($file=$request->has('device_pic')){
            $file=$request->file('device_pic');
            $device_pic=time().'-'.$file->getClientOriginalName();
            $file->move(public_path('/monitor'),$device_pic);
        }

        if($file1=$request->has('invoice_file')){
            $file1=$request->file('invoice_file');
            $invoice_file=time().'-'.$file1->getClientOriginalName();
            $file1->move(public_path('/monitor'),$invoice_file);
        }

        $monitor=new Asset;
        $monitor->storage=$request->input('storage');
        $monitor->systemid=$systemid;
        $monitor->brand=$request->input('brand');
        $monitor->configuration=$request->input('configuration');
        $monitor->serial_no=$request->input('serial_no');
        $monitor->status=$request->input('status');
        $monitor->warranty_end=$request->input('warranty_end');

        $monitor->invoice_no=$request->input('invoice_no');
        $monitor->invoice_date=$request->input('invoice_date');
        $monitor->invoice_company_name=$request->input('invoice_company_name');

        $monitor->accessoriesName="monitor";
        $monitor->accessoriesCategory="Accessories";

        $monitor->device_pic=$device_pic ?? '';
        $monitor->invoice_file=$invoice_file ?? '';
        $monitor->accessories_type='6';
        //$monitor->system_type='1';
        $monitor=$monitor->save();
        if($monitor){
            $monitor_data=Asset::orderBy('id','desc')->first()->id;
            $assignIT=Employee::where('role','AdminIT')->where('status','1')->first()->id;
            $assign=new Assign;
            $assign->type="8";
            //$assign->monitor=$request->input('monitor');
            $assign->item_id=$monitor_data;
            $assign->assign=Session::get('Auth_id');//$assignIT; //auto assign it admin
            $assign->assign_by=Session::get('Auth_name');
            $assign->assign_date=date('y-m-d');
            $assign=$assign->save();
            if($assign){
                return back()->with('msg',"monitor Add Successfully");
            }else{
                return back()->with('err_msg',"Some Error");
            }
            
        }else{
            return back()->with('err_msg',"Some Error in monitor Add");
        }
    }


    //monitor assign
    public function monitorAssign(Request $request){
        //dd($request->input('empcode'));
        $empid=Employee::where('empcode',$request->input('empcode'))->first()->id;
        //dd($empid);
        $assign=new Assign;
        $assign->type="8";
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
    //mouse end



    public function productDetail($id){
        //$data=Ram::where('id',$id)->first();
        $data=DB::table('ram');
        $data->select('ram.*','employee.name as empname');
        $data->join('assign_table','assign_table.item_id','=','ram.id');
        $data->join('employee','employee.id','=','assign_table.assign');
        $data->where('assign_table.type','8');
        $data->where('ram.accessories_type','6');
        $data->orderBy('id','desc');
        $data=$data->get();


        return view('product-detail',compact('data'));
    }



    

}
