<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\contract;
use App\Models\education;
use App\Models\loker;
use App\Models\perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JobVacancies extends Controller
{
    public function index()
    {
        $data = loker::select('lokers.*', 'pekerjaans.pekerjaan')
            ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
            ->join('pekerjaans', 'pekerjaans.id','=','lokers.id_pekerjaan')
            ->where('perusahaans.id_owner', '=', Auth::user()->id)
            ->get();
        // return $data;
        return view('company.jobVacancies',['jobVacancies'=>$data]);
    }

    public function viewCreate()
    {
        $education = education::select('*')->get();
        $contract = contract::select('*')->get();
        return view('company.addjobvacancies',['education'=>$education, 'contract'=>$contract]);
    }

    public function getPositionData(Request $request)
    {
        $data = [];
            $search = $request->q;
            $data = DB::table("pekerjaans")
            ->select("id", "pekerjaan")
            ->where('pekerjaan', 'LIKE', "%$search%")
            ->get();
        return response()->json($data);
    }

    public function storeJobVacancy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_name' => 'required',
            'position' => 'required|numeric|min:1',
            'education' => 'required|numeric|min:1',
            'contract' => 'required|numeric|min:1',
            'date_start' => 'required',
            'date_end' => 'required',
            'description' => 'required',
            'salary'=>'required|numeric|digits_between:1,10'
        ]);
        // return $request;

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'error' => $validator->errors()->toJson()
            ]);
        }
         
        // Cari ID Perusahaan
        $id_perusahaan = perusahaan::select('id')
                        ->where('id_owner','=',Auth::user()->id)
                        ->first();

        $input = $request->all();
        // Simpan user
        $loker = new loker;
        $loker->judul_loker = $input['job_name'];
        $loker->tanggal_awal = $input['date_start'];
        $loker->tanggal_akhir = $input['date_end'];
        $loker->id_contract=$input['contract'];
        $loker->id_perusahaan= $id_perusahaan->id;
        $loker->id_pekerjaan= $input['position'];
        $loker->salary=$input['salary'];
        $loker->deskripsi = $input['description'];
        $loker->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully add a new Job Vacancy'
        ]);
    }
}
