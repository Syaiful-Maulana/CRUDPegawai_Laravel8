<?php

namespace App\Models;

use App\Models\Religion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $dates=['created_at'];
    protected $fillable = [
        'nama',
        'nip',
        'alamat',
        'tanggal',
        'jeniskelamin',
        'email',
        'no_hp',
        'kendaraan',
        'foto',
        'plat'
    ];

}
