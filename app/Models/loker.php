<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loker extends Model
{
    use HasFactory;
    protected $fillable=[
        'judul_loker','tanggal_awal','tanggal_akhir',
        'deskripsi','id_contract','salary','id_perusahaan',
        'id_pekerjaan'
    ];
}
