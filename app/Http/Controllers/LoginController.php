<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Session;
use Mail;
use Hash;
class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function auth(Request $request){
        $validate=$request->validate([
            "email" => 'required',
            "password" => 'required',
        ]);
        //dd($request->input('password'));
        $password=md5($request->input('password'));
        $data=Employee::where('email',$request->input('email'))->where('password',$password)->first();
        //dd($data);
        if($data){
            Session::put('Auth_id',$data->id);
            Session::put('Auth_name',$data->name);
            Session::put('role',$data->role);
            // Session::put('user_name',$data->uname);
            
            // $dat=["email"=>"devendra1784@hotmail.com"]; //send data to view
            // $input['email'] = "devendra1784@hotmail.com";
            // $input['name'] = "Document Portal";
            // $subject="\xE2\x9A\xA0 Alert!! $data->uname Login to Document Application.";
            // \Mail::send('sendmail', $dat, function($message) use($input,$subject){
            //     $message->to($input['email'], $input['name'])
            //         ->subject($subject);
            // });
            
            
            
            return redirect('asset-dashboard');
        }else{
            return back()->with('msg','Login Faield');
        }

    }

    public function logout(){
        session_unset();
        Session::flush();
        return redirect('/');
    }
    
    
    
    public function sendotp(Request $request){
        $otp = mt_rand(100000, 999999);
		$request->session()->put('user.otp', $otp);
        $message = "{$otp} is Lead Portal Verification Code for {$request->session()->get('user.name')} CROMA CAMPUS";
		$templateId ='1707161786775524106';
		if($request->input('name')=='admin'){
		    sendSMS('9818014543',$message,$templateId);
		}else{
		    sendSMS('9560428456',$message,$templateId);
		}
		
		
    }
    
    
    
    public function delete_folder($folder) {
        $glob = glob($folder);
        foreach ($glob as $g) {
            if (!is_dir($g)) {
                unlink($g);
            } else {
                delete_folder("$g/*");
                rmdir($g);
            }
        }
    }
    
    
   
    
    
}








// database “cromag8l_document”.
// user cromag8l_document
// pass 85&Lcu?&?UNR

