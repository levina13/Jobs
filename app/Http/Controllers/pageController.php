<?php

namespace App\Http\Controllers;

use App\Models\loker;
use App\Models\User;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function companyProfile($id)
    {
        $data = User::select('users.*','jenis_perusahaans.jenis_perusahaan as sector'
                            , 'perusahaans.description', 'perusahaans.address')
                ->join('perusahaans', 'perusahaans.id_owner','=','users.id')
                ->join('jenis_perusahaans','jenis_perusahaans.id','=','perusahaans.id_jenis_perusahaan')
                ->where('perusahaans.id','=',$id)
                ->where('users.role','=','B')
                ->first();
        return view('applicant.companyprofile',['company'=>$data]);
    }
    public function applicantProfile($id)
    {
        $data = User::select(
            'users.*',
            'cities.city',
            'provinces.province',
            'education.education'
        )
        ->leftJoin('cities', 'cities.id', '=', 'users.id_city')
        ->leftJoin('provinces', 'provinces.id', '=', 'cities.id_province')
        ->leftJoin('education', 'education.id', '=', 'users.id_education')
        ->where('users.id', '=', $id)
        ->where('users.role', '=', 'A')
            ->first();

        return view('applicant.profileapplicant',['applicant'=>$data]);
    }
    public function detailLoker($id)
    {
        $data = loker::select('lokers.judul_loker as title'
                            , 'users.photo','users.name'
                            , 'pekerjaans.pekerjaan as position'
                            , 'lokers.deskripsi as description', 'lokers.id')
                    ->join('perusahaans','perusahaans.id','=','lokers.id_perusahaan')
                    ->join('users','users.id','=','perusahaans.id_owner')
                    ->join('pekerjaans','pekerjaans.id','=','lokers.id_pekerjaan')
                    ->where('lokers.id','=',$id)
                    ->first();
        return view('applicant.detailjobs', ['loker'=>$data]);
    }
}
