<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use App\Models\cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CVController extends Controller
{
    function indexCV(){
        $data = cv::select('*')->get();
        return $data;
    }
    function submitCVProfile(Request $request){
        $validator = Validator::make($request->all(),[
            'first_name'=>'required|max:15',
            'last_name' => 'required|max:15',
            'email'=>'required|email',
            'telepon'=>'required|numeric|digits_between:9,12',
            'education'=>'required'
        ]);
        
    }

}
