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

        $jobVacancies= loker::count()
                        ->join('perusahaans','perusahaans.id','=','lokers.id_perusahaan')
                        ->where('perusahaans.id_owner','=',Auth::user()->id);
        $applicants= lamaran::count()
                        ->join('lokers','lokers.id','=','lamarans.id_loker')
                        ->join('perusahaans','perusahaans.id','=','lokers.id_perusahaan')
                        ->where('perusahaans.id_owner','=',Auth::user()->id);
        $accepted = lamaran::count()
            ->join('lokers', 'lokers.id', '=', 'lamarans.id_loker')
            ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
            ->where('perusahaans.id_owner', '=', Auth::user()->id)
            ->andwhere('lamarans.status','=','1');

        $rejected = lamaran::count()
            ->join('lokers', 'lokers.id', '=', 'lamarans.id_loker')
            ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
            ->where('perusahaans.id_owner', '=', Auth::user()->id)
            ->andwhere('lamarans.status', '=', '2');

        return view('company.dashboard',['jobVacancies'=>$jobVacancies,
                                        'applicants'=>$applicants,
                                        'accepted'=>$accepted,
                                        'rejected'=>$rejected]);
    }
}
