<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    function showProfile(){
        $data = User::select(
            'users.*',
            'cities.city',
            'provinces.province',
            'education.education')
            ->leftJoin('cities','cities.id','=','users.id_city')
            ->leftJoin('provinces','provinces.id','=','cities.id_province')
            ->leftJoin('education','education.id','=','users.id_education')
            ->where('users.id','=',Auth::user()->id)
            ->first();

        return $data;
    }
    function viewEditProfile($id){
        
    }
    function editProfile($id){

    }
}
