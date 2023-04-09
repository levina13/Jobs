<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\contract;
use App\Models\education;
use App\Models\loker;
use App\Models\perusahaan;
use App\Models\salaryCategory;
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
            'contract' => 'required|numeric|min:1',
            'date_start' => 'required',
            'date_end' => 'required',
            'description' => 'required',
            'salary'=>'required|numeric|digits_between:1,9'
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

        // Cari id_categori salary
        $id_salary= salaryCategory::select('id')
                    ->where('start','<=', $input['salary'])
                    ->where('end','>=',$input['salary'])
                    ->first();

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
        $loker->id_salary_category=$id_salary->id;
        $loker->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully add a new Job Vacancy'
        ]);
    }

    public function viewEdit($id)
    {
        $data = loker::select('lokers.*', 'pekerjaans.pekerjaan')
            ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
            ->join('pekerjaans', 'pekerjaans.id','=','lokers.id_pekerjaan')
            ->where('lokers.id', '=', $id)
            ->first();

        $contract = contract::select('*')->get();
        
        // return $data;
        return view('company.editjobvacancies',['jobVacancy'=>$data,'contract'=>$contract]);
    }

    public function updateJobVacancy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_name' => 'required',
            'position' => 'required|numeric|min:1',
            'contract' => 'required|numeric|min:1',
            'date_start' => 'required',
            'date_end' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric|digits_between:1,10',
            'id'=>'required',
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
            ->where('id_owner', '=', Auth::user()->id)
            ->first();

        $input = $request->all();
        // Simpan user
        $loker = loker::where('id',$input['id'])->first();
        $loker->judul_loker = $input['job_name'];
        $loker->tanggal_awal = $input['date_start'];
        $loker->tanggal_akhir = $input['date_end'];
        $loker->id_contract = $input['contract'];
        $loker->id_perusahaan = $id_perusahaan->id;
        $loker->id_pekerjaan = $input['position'];
        $loker->salary = $input['salary'];
        $loker->deskripsi = $input['description'];
        $loker->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully edit a Job Vacancy'
        ]);
    }

    public function deleteJobVacancy($id)
    {
        $jobVacancy = loker::where('id', $id)->first();

        if ($jobVacancy != null) {
            $jobVacancy->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully delete a Job Vacancy'
            ]);
        }

        return response()->json([
            'status' => 'failed to delete',
            'error' => "The Job Vacancy is not found!!"
        ]);
    }

    public function detailJobVacancies($id)
    {
        $data = loker::select('lokers.*', 'pekerjaans.pekerjaan', 'users.name as company_name', 'contracts.contract')
        ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
        ->join('pekerjaans', 'pekerjaans.id', '=', 'lokers.id_pekerjaan')
        ->join('users','users.id','=','perusahaans.id_owner')
        ->join('contracts','contracts.id','=','lokers.id_contract')
        ->where('lokers.id', '=', $id)
        ->first();
        return view('company.showjobvacancies', ['jobVacancy' => $data]);
        // return view('company.showjobvacancies',['jobVacancy'=>$data]);
    }
}
