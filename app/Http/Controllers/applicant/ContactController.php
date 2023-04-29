<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function sendEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'name'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'error' => $validator->errors()->toJson()
            ]);
        }

        try {
            // $m = array(
            //         'messages' => $request->message
            //         );
            // $n = '$request->name';
            $data = $request->message;
            $name=$request->name;
            Mail::send('email.contactUs', ['name'=>$name,'msg'=>$data], 
            function ($message) use ($request) {
                $message->from($request->email);
                $message->to('jobs@gmail.com');
                $message->subject($request->subject);
            });
            return response()->json([
                'status' => 'success',
            ]);

        } catch (\Throwable $th) {
            // return Response::send(['data' => true]);
            return false;
            // return response()->json([
            //     'status' => 'failed',
            //     'error'=>'',
            // ]);
        }    
    }
}
