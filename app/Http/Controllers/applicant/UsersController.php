<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\province;
use App\Models\education;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\support\facades\Validator;

class UsersController extends Controller
{
   public function showProfile($id){
        $data = User::select(
            'users.*',
            'cities.city',
            'provinces.province',
            'education.education')
            ->leftJoin('cities','cities.id','=','users.id_city')
            ->leftJoin('provinces','provinces.id','=','cities.id_province')
            ->leftJoin('education','education.id','=','users.id_education')
            ->where('users.id','=',$id)
            ->first();

        return $data;
    }
    public function viewEditProfile($id){
        $data = User::select('users.*','cities.city','cities.id_province','provinces.province','education.education')
                ->leftJoin('cities','cities.id','=','users.id_city')
                ->leftJoin('provinces','provinces.id','=','cities.id_province')
                ->leftJoin('education','education.id','=','users.id_education')
                ->where('users.id','=',$id)
                ->first();
        return view('applicant.editprofileapplicant',['user'=>$data]);
    }
    public function updateProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'user_headline' => 'required|numeric|min:1',
            'user_email' => 'required|numeric|min:1',
            'user_mobile' => 'required',
            // 'province' => 'required',
            // 'city' => 'required',
            // 'education'=>'required|numeric|digits_between:1,10'
            'id_user' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'error' => $validator->errors()->toJson()
            ]);
        }
        $input=$request->all();

        //tabel user
        $user = User::where('id',$input['id_user']->first());
        $user->name=$input['user_name'];
        $user->headline=$input['user_headline'];
        $user->id_city=$input['city'];
        $user->id_education=$input['education'];

        if ($request->hasFile('image')) {
            $path = 'uploads/profile_image/'. $user->photo;
            if (File::exists($path)) {
                File::delete($path);
            }
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

