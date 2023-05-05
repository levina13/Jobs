<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\jenis_perusahaan;
use App\Models\perusahaan;
use App\Models\province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function viewMyProfile()
    {
        $data = User::select(
            'users.*',
            'jenis_perusahaans.jenis_perusahaan as sector',
            'perusahaans.id_jenis_perusahaan',
            'cities.city',
            'cities.id_province',
            'provinces.province',
            'perusahaans.address',
            'perusahaans.description',
            'perusahaans.id as id_company'
        )
        ->join('perusahaans', 'perusahaans.id_owner', '=', 'users.id')
        ->join('jenis_perusahaans', 'jenis_perusahaans.id', '=', 'perusahaans.id_jenis_perusahaan')
        ->leftJoin('cities', 'cities.id', '=', 'users.id_city')
        ->leftJoin('provinces', 'provinces.id', '=', 'cities.id_province')
        ->where('users.id', '=', Auth::user()->id)
            ->first();
        return view('company.profilecompany',['company'=>$data]);
    }
    public function viewEditProfile($id)
    {
        $data = User::select('users.*','jenis_perusahaans.jenis_perusahaan as sector','perusahaans.id_jenis_perusahaan'
                        ,'cities.city','cities.id_province', 'provinces.province'
                        ,'perusahaans.address','perusahaans.description','perusahaans.id as id_company')
                    ->join('perusahaans','perusahaans.id_owner','=','users.id')
                    ->join('jenis_perusahaans','jenis_perusahaans.id','=','perusahaans.id_jenis_perusahaan')
                    ->leftJoin('cities','cities.id','=','users.id_city')
                    ->leftJoin('provinces','provinces.id','=','cities.id_province')
                    ->where('users.id','=',$id)
                    ->first();
        // return $data;
        
        return view('company.editprofilecompany',['company'=>$data]);
    }
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'sector' => 'required|numeric|min:1',
            'region' => 'required|numeric|min:1',
            'city' => 'required|numeric|min:1',
            'address' => 'required',
            'description' => 'required',
            'id_company' => 'required',
            'image'=>'image'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'error' => $validator->errors()->toJson()
            ]);
        }
        
        $input=$request->all();

        // Tabel User
        $owner = User::join('perusahaans','perusahaans.id_owner','=','users.id')
                    ->where('perusahaans.id','=',$input['id_company'])
                    ->first();
        $owner->name= $input['company_name'];
        $owner->id_city=$input['city'];


        if ($request->hasFile('image')) {
            $path = 'uploads/profil_image/' . $owner->photo;

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/profil_image/', $filename);
            $owner->photo = $filename;
        }
        $owner->save();

        // Tabel Perusahaan
        $company = perusahaan::where('id',$input['id_company'])->first();
        $company->id_jenis_perusahaan=$input['sector'];
        $company->address=$input['address'];
        $company->description=$input['description'];
        $company->save();
        return response()->json([
            'status' => 'success',
        ]);
        return $validator;

    }

    public function getSector(Request $request)
    {
        $data = [];
        $search = $request->q;
        $data = jenis_perusahaan::select("id", "jenis_perusahaan")
            ->where('jenis_perusahaan', 'LIKE', "%$search%")
            ->get();
        return response()->json($data);
    }
    public function getRegion(Request $request)
    {
        $data = [];
        $search = $request->q;
        $data = province::select("id", "province")
        ->where('province', 'LIKE', "%$search%")
        ->get();
        return response()->json($data);
    }
    
    public function getCity(Request $request,$id)
    {
        $data = [];
        $search = $request->q;
        $data = city::select("id", "city")
            ->where('id_province','=',$id)
            ->where('city', 'LIKE', "%$search%")
            ->get();
        return response()->json($data);
    }
}
