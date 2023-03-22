<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobVacancies extends Controller
{
    public function index()
    {
        $data = loker::select('*')
            ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
            ->where('perusahaans.id_owner', '=', Auth::user()->id)
            ->get();
        return view('company.jobVacancies',['jobVacancies',$data]);
    }
    public function storeJobVacancy(Request $request)
    {
        
    }
}
