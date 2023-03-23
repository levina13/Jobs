<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\education;
use App\Models\loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('company.addjobvacancies',['education'=>$education]);
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

    }
}
