<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use App\Models\contract;
use App\Models\favorite;
use App\Models\jenis_perusahaan;
use App\Models\lamaran;
use App\Models\loker;
use App\Models\salaryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    public function SearchFindJobs(Request $request)
    {
        $keyword=$request->input('keyword');
        $id_user=0;
        if (Auth::check()) {
            $id_user= Auth::user()->id;
        };

        $data = loker::select('lokers.judul_loker','lokers.tanggal_awal', 'lokers.id as id_loker',
                                'lokers.tanggal_akhir', 'lokers.salary','lokers.id_salary_category',
                                'users.name','users.photo','pekerjaans.pekerjaan',
                                'contracts.contract','cities.city', 'provinces.province',
                                'contracts.id as id_contract', 'favorites.id as id_favorite',
                                'perusahaans.id_jenis_perusahaan as id_industry')
                ->join('perusahaans', 'perusahaans.id','=','lokers.id_perusahaan')
                ->join('users','users.id','=','perusahaans.id_owner')
                ->join('pekerjaans','pekerjaans.id','=','lokers.id_perusahaan')
                ->join('contracts','contracts.id','=','lokers.id_contract')
                ->leftJoin('cities','cities.id','=','users.id_city')
                ->leftJoin('provinces','provinces.id','=','cities.id_province')
                ->leftJoin('favorites', function($q) use ($id_user)
                    {
                        $q->on('favorites.id_loker', '=', 'lokers.id')
                            ->where('favorites.id_pelamar', '=', "$id_user");
                    })
                ->where(function($q) use ($keyword){
                        $q->where('lokers.judul_loker','LIKE','%'.$keyword.'%')
                        ->orwhere('pekerjaans.pekerjaan','LIKE','%'.$keyword.'%')
                        ->orwhere('users.name','LIKE','%'.$keyword.'%');
                    })
                ->whereDate('lokers.tanggal_awal', '<', now())
                ->whereDate('lokers.tanggal_akhir','>',now())
                ->get();
        $contracts = contract::select('*')->get();
        $industry = jenis_perusahaan::select('*')->get();
        $salary= salaryCategory::select('*')->get();



        // return [$data, $contracts, $industry];
        return view('applicant.findJobs',['data'=>$data,'contract'=>$contracts,
                                        'industry'=>$industry, 'keyword'=>$keyword,
                                        'salary'=>$salary]);


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
    public function openApply($id)
    {
        return view('applicant.applyform',['id_loker'=>$id]);
    }
    public function applyJob(Request $request)
    {
        // Validate
        $input=$request->all();
        $id_user= Auth::user()->id;
        $history=lamaran::where('id_loker','=', $input['id_loker'])
                        ->where('id_pelamar','=',$id_user)
                        ->first();
        if(is_null($history)){
            $validator = Validator::make($request->all(), [
                'cv' => 'required|mimes:pdf'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'failed',
                    'cause' => 'input',
                    'error' => $validator->errors()->toJson()
                ]);
            }

            // Insert to Lamarans table
            $lamaran = new lamaran;
            $lamaran->id_loker = $input['id_loker'];
            $lamaran->id_pelamar = $id_user;

            // Insert CV
            $file = $request->file('cv');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/applyJobDocument/cv/', $filename);
            $lamaran->cv = $filename;

            if ($request->hasFile('additional1')) {
                $file = $request->file('additional1');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/applyJobDocument/additional1/', $filename);
                $lamaran->additional1 = $filename;
            };
            if ($request->hasFile('additional2')) {
                $file = $request->file('additional2');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/applyJobDocument/additional2/', $filename);
                $lamaran->additional2 = $filename;
            };
            $lamaran->save();
            return response()->json([
                'status' => 'success',
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'message'=>'you have applied the job'
            ]);
        }



    }

    public function favorite($id){
        // id = id_loker
        // Cari kalo ada
        $favourite= favorite::where('id_loker','=',$id)
                    ->where('id_pelamar','=',Auth::user()->id)
                    ->first();

        // cek kalo ada atau tidak
        if(is_null($favourite)){
            $newFavourite = new favorite;
            $newFavourite->id_loker=$id;
            $newFavourite->id_pelamar=Auth::user()->id;
            $newFavourite->save();
            return response()->json([
                'status' => 'success',
                'message' => 'successfully add to Favourite'
            ]);
        }else{
            $favourite->delete();
            // $favourite->save();
            return response()->json([
                'status' => 'success',
                'message' => 'successfully remove from your Favourites'
            ]);
        }
        return response()->json([
            'status'=>'failed'
        ]);
    }
}
