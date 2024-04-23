<?php 
function authname($id){
	$data=App\Models\AdminLogin::where('id',$id)->first();
	return $data->username;
}

// function authpic($id){
// 	$data=App\Models\AdminLogin::where('id',$id)->first();
// 	return $data->profile_pic;
// }

function authid($id){
	$data=App\Models\AdminLogin::where('id',$id)->first();
	return $data->id;
}

function basepath($file){
	return "https://employment.cromacampus.com/public/asset/".$file;
	//return "https://course.cromacampus.com/public/".$file;
}

?>