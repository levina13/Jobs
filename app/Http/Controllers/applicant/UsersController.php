<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function showProfile($id){
        $data = User::select(
            'users.*',
            'cities.city',
            'provinces.province',
            'education.education')
            ->leftJoin('cities','cities.id','=','users.id_city')
            ->leftJoin('provinces','provinces.id','=','cities.id_province')
            ->leftJoin('education','education.id','=','users.id_education')
            ->where('users.id','=',$id)
            ->first();

        return $data;
    }
    function viewEditProfile($id){
        $
    }
    function editProfile($id){

    }
}
