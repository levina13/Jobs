<?php

namespace App\Http\Controllers;

use App\Models\cv;
use App\Models\lamaran;
use App\Models\loker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class pageController extends Controller
{
    public function index(){
        $email='';
        $name='';
        if (Auth::check()) {
            $email = Auth::user()->email;
            $name=Auth::user()->name;
        };
        $cv = cv::select('*')->take(9)->get();
        return view('index',['email'=>$email,'name'=>$name,'cv'=>$cv]);
    }
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
        $id_user = 0;
        $applyButton='';
        if (Auth::check()) {
            $id_user = Auth::user()->id;
            $applied=lamaran::where('id_loker','=',$id)
                            ->where('id_pelamar','=',$id_user)
                            ->first();
            $notExpired=loker::where('id','=',$id)
                        ->whereDate('lokers.tanggal_awal', '<', now())
                        ->whereDate('lokers.tanggal_akhir','>',now())
                        ->first();
            if(!is_null($applied) or is_null($notExpired)){
                $applyButton='disabled';
            };
        };
        $data = loker::select('lokers.judul_loker as title','favorites.id as id_favorite'
                            , 'users.photo','users.name', 'lokers.salary'
                            , 'pekerjaans.pekerjaan as position','contracts.contract'
                            , 'lokers.deskripsi as description', 'lokers.id','perusahaans.id as id_perusahaan')
                    ->join('perusahaans','perusahaans.id','=','lokers.id_perusahaan')
                    ->join('users','users.id','=','perusahaans.id_owner')
                    ->join('pekerjaans','pekerjaans.id','=','lokers.id_pekerjaan')
                    ->join('contracts','contracts.id','=','lokers.id_contract')
                    ->leftJoin('favorites', function ($q) use ($id_user) {
                        $q->on('favorites.id_loker', '=', 'lokers.id')
                            ->where('favorites.id_pelamar', '=', "$id_user");
                    })
                    ->where('lokers.id','=',$id)
                    ->first();
        
        return view('applicant.detailjobs', ['loker'=>$data,'applyButton'=>$applyButton]);
    }
}
