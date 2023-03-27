<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use App\Models\contract;
use App\Models\favorite;
use App\Models\jenis_perusahaan;
use App\Models\lamaran;
use App\Models\loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function SearchFindJobs(Request $request)
    {
        $keyword=$request->input('keyword');
        $data = loker::select('lokers.judul_loker','lokers.tanggal_awal',
                                'lokers.tanggal_akhir', 'lokers.salary',
                                'users.name','users.photo','pekerjaans.pekerjaan',
                                'contracts.contract','cities.city', 'provinces.province')
                ->join('perusahaans', 'perusahaans.id','=','lokers.id_perusahaan')
                ->join('users','users.id','=','perusahaans.id_owner')
                ->join('pekerjaans','pekerjaans.id','=','lokers.id_perusahaan')
                ->join('contracts','contracts.id','=','lokers.id_contract')
                ->join('cities','cities.id','=','users.id_city')
                ->join('provinces','provinces.id','=','cities.id_province')
                ->where('lokers.judul_loker','LIKE','%'.$keyword.'%')
                ->orwhere('pekerjaans.pekerjaan','LIKE','%'.$keyword.'%')
                ->orwhere('users.name','LIKE','%'.$keyword.'%')
                ->get();
        $contracts = contract::select('*')->get();
        $industry = jenis_perusahaan::select('*')->get();


        return [$data, $contracts, $industry];
        return view('',['data'=>$data,'contract'=>$contracts,'industry'=>$industry]);


    }
    public function FilterFindJobs($salary_start=null,$salary_end=null,$contract=null,$industry=null)
    {
        $contracts = contract::select('*')->get();
        $industry = jenis_perusahaan::select('*')->get();

        if(isset($salary_start)&&isset($salary_end)){
            $data = loker::select(
                'lokers.judul_loker',
                'lokers.tanggal_awal',
                'lokers.tanggal_akhir',
                'lokers.salary',
                'users.name',
                'users.photo',
                'pekerjaans.pekerjaan',
                'contracts.contract',
                'cities.city',
                'provinces.province'
            )
                ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
                ->join('users', 'users.id', '=', 'perusahaans.id_owner')
                ->join('pekerjaans', 'pekerjaans.id', '=', 'lokers.id_perusahaan')
                ->join('contracts', 'contracts.id', '=', 'lokers.id_contract')
                ->join('cities', 'cities.id', '=', 'users.id_city')
                ->join('provinces', 'provinces.id', '=', 'cities.id_province')
                ->whereBetween('lokers.salary', [$salary_start,$salary_end])
                ->get();
        }elseif(isset($contract)){
            $data = loker::select(
                'lokers.judul_loker',
                'lokers.tanggal_awal',
                'lokers.tanggal_akhir',
                'lokers.salary',
                'users.name',
                'users.photo',
                'pekerjaans.pekerjaan',
                'contracts.contract',
                'cities.city',
                'provinces.province'
            )
                ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
                ->join('users', 'users.id', '=', 'perusahaans.id_owner')
                ->join('pekerjaans', 'pekerjaans.id', '=', 'lokers.id_perusahaan')
                ->join('contracts', 'contracts.id', '=', 'lokers.id_contract')
                ->join('cities', 'cities.id', '=', 'users.id_city')
                ->join('provinces', 'provinces.id', '=', 'cities.id_province')
                ->where('contracts.id', '=',$contract)
                ->get();

        }elseif(isset($industry)){
            $data = loker::select(
                'lokers.judul_loker',
                'lokers.tanggal_awal',
                'lokers.tanggal_akhir',
                'lokers.salary',
                'users.name',
                'users.photo',
                'pekerjaans.pekerjaan',
                'contracts.contract',
                'cities.city',
                'provinces.province'
            )
                ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
                ->join('users', 'users.id', '=', 'perusahaans.id_owner')
                ->join('pekerjaans', 'pekerjaans.id', '=', 'lokers.id_perusahaan')
                ->join('contracts', 'contracts.id', '=', 'lokers.id_contract')
                ->join('cities', 'cities.id', '=', 'users.id_city')
                ->join('provinces', 'provinces.id', '=', 'cities.id_province')
                ->join('jenis_perusahaans','jenis_perusahaans.id','=','perusahaans.id_jenis_perusahaan')
                ->where('jenis_perusahaans.id', '=', $industry)
                ->get();
        }
        return [$data, $contracts, $industry];
        return view('', ['data' => $data, 'contract' => $contracts, 'industry' => $industry]);
    }

    public function showHistory()
    {
        $data = lamaran::select('users.name as company_name'
                                , 'pekerjaans.pekerjaan as position'
                                , 'lamarans.status', 'lamarans.id', 'lokers.id as id_loker')
                        ->join('lokers','lokers.id','=','lamarans.id_loker')
                        ->join('perusahaans','perusahaans.id','=','lokers.id_perusahaan')
                        ->join('users','users.id','=','perusahaans.id_owner')
                        ->join('pekerjaans','pekerjaans.id','=','lokers.id_pekerjaan')
                        ->where('lamarans.id_pelamar','=',Auth::user()->id)
                        ->where('lamarans.status','!=','0')
                        ->get();
        return view('applicant.myjobshistory', ['lamaran'=>$data]);
    }
    public function showCurrently()
    {
        $data = lamaran::select(
            'users.name as company_name',
            'pekerjaans.pekerjaan as position',
            'lamarans.status',
            'lamarans.id',
            'lokers.id as id_loker'
        )
        ->join('lokers', 'lokers.id', '=', 'lamarans.id_loker')
        ->join('perusahaans', 'perusahaans.id', '=', 'lokers.id_perusahaan')
        ->join('users', 'users.id', '=', 'perusahaans.id_owner')
        ->join('pekerjaans', 'pekerjaans.id', '=', 'lokers.id_pekerjaan')
        ->where('lamarans.id_pelamar', '=', Auth::user()->id)
            ->where('lamarans.status', '=', '0')
            ->get();
        return view('applicant.myjobscurrently', ['lamaran' => $data]);
    }
    public function showFavorite()
    {
        $data = favorite::select('users.name as company_name'
                                , 'pekerjaans.pekerjaan as position'
                                , 'lokers.id as id_loker')
                ->join('lokers','lokers.id','=','favorites.id_loker')
                ->join('perusahaans','perusahaans.id','=','lokers.id_perusahaan')
                ->join('users','users.id','=','perusahaans.id_owner')
                ->join('pekerjaans','pekerjaans.id','=','lokers.id_pekerjaan')
                ->where('favorites.id_pelamar','=',Auth::user()->id)
                ->get();
        return view('applicant.myjobsFavorite',['loker'=>$data]);
    }

}
