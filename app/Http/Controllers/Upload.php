<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fileupload;
use Storage;

class Upload extends Controller
{
    public static function single_upload($data = []){
    	isset($data['delete_file'])&&Storage::has($data['delete_file'])?Storage::delete($data['delete_file']):'';
    	if($data['new_name'] == true){
    		$new_name = 'website_'.$data['file'].time().rand(0,999).request()->file($data['file'])->getClientOriginalName();
    		return request()->file($data['file'])->storeAs($data['path'],$new_name);	
    	}else{
    		return request()->file($data['file'])->store($data['path']);
    	}
    }
}
