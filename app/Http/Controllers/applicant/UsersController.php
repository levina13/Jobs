<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\province;
use App\Models\education;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\support\facades\Validator;

class UsersController extends Controller
{
    public function showProfile(){
        $data = User::select(
            'users.*',
            'cities.city',
            'provinces.province',
            'education.education')
            ->leftJoin('cities','cities.id','=','users.id_city')
            ->leftJoin('provinces','provinces.id','=','cities.id_province')
            ->leftJoin('education','education.id','=','users.id_education')
            ->where('users.id','=',Auth::user()->id)
            ->first();

        return view('applicant.profileapplicant',['applicant'=>$data]);
    }
    public function viewEditProfile(){
        $id = Auth::user()->id;
        $data = User::select('users.*','cities.city','cities.id as id_city','cities.id_province','provinces.province','education.education' )
                ->leftJoin('cities','cities.id','=','users.id_city')
                ->leftJoin('provinces','provinces.id','=','cities.id_province')
                ->leftJoin('education','education.id','=','users.id_education')
                ->where('users.id','=',$id)
                ->first();
        return view('applicant.editprofileapplicant',['user'=>$data]);
    }
    public function updateProfile(Request $request){
        // Model untuk tabel user (hapus email dan telepon dulu)
        
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'user_headline' => 'required',
            'user_email' => 'required|email',
            'user_mobile' => 'required|numeric|digits_between:9,12',
            // 'province' => 'required',
            // 'city' => 'required',
            // 'education'=>'required|numeric|digits_between:1,10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'error' => $validator->errors()->toJson()
            ]);
        }
        $input=$request->all();
        $id= Auth::user()->id;

        //tabel user
        $user = User::where('id', $id)->first();
        $user->name=$input['user_name'];
        $user->headline=$input['user_headline'];
        $user->email = $input['user_email'];
        $user->telepon = $input['user_mobile'];
        $user->id_city=$input['city'];
        $user->id_education=$input['education'];

        if ($request->hasFile('image')) {
            $path = 'uploads/profile_image/'. $user->photo;

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/profil_image/', $filename);
            $user->photo = $filename;
        }
        $user->save();

        return response()->json([
            'status' => 'success',
        ]);
        return $validator;
    }
    public function getRegion(Request $request)
    {
        $data = [];
            $search = $request->q;
            $data = province::select("id","province")
            ->where('province', 'LIKE', "%$search%")
            ->get();
        return response()->json($data);
    }
    public function getCity(Request $request, $id)
    {
        $data = [];
            $search = $request->q;
            $data = city::select("id","city")
            ->where('id_province', '=', $id)
            ->where('city', 'LIKE', "%$search%")
            ->get();
        return response()->json($data);
    }
    public function getEducation(Request $request)
    {
        $data = [];
            $search = $request->q;
            $data = education::select("id","education")
            ->where('education', 'LIKE', "%$search%")
            ->get();
        return response()->json($data);
    }
}

