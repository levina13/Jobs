<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lamaran extends Model
{
    use HasFactory;
    protected $fillable=[
        'status','id_pelamar','id_loker','cv'
    ];
}
