<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\lamaran;
use App\Models\loker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function getDashboard()
    {

        $jobVacancies= loker::select('*')
                        ->join('perusahaans','perusahaans.id','=','lokers.id_perusahaan')
                        ->where('perusahaans.id_owner','=',Auth::user()->id)->count();
        $applicants= lamaran::select('*')
                        ->join('lokers','lokers.id','=','lamarans.id_loker')
                        ->join('perusahaans','perusahaans.id','=','lokers.id_perusahaan')
                        ->where('perusahaans.id_owner','=',Auth::user()->id)->count();
        $accepted = lamaran::select('*')
            ->join('lokers', 'lokers.id', '=', 'lamarans.id_loker')
            ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
            ->where('perusahaans.id_owner', '=', Auth::user()->id)
            ->where('lamarans.status','=','1')->count();

        $rejected = lamaran::select('*')
            ->join('lokers', 'lokers.id', '=', 'lamarans.id_loker')
            ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
            ->where('perusahaans.id_owner', '=', Auth::user()->id)
            ->where('lamarans.status', '=', '2')->count();
        return view('company.dashboard',['jobVacancies'=>$jobVacancies,
                                        'applicants'=>$applicants,
                                        'accepted'=>$accepted,
                                        'rejected'=>$rejected]);
    }
}
