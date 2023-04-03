<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cvHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'id','first_name','last_name','email',
        'phone_number','education','address',
        'working_experience','skill','photo',
        'id_cv'
    ];
}
