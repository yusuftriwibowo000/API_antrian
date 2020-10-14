<?php

namespace App\Model;

// use Illuminate\Auth\Authenticatable;
// use Illuminate\Contracts\Auth\Access\Authorizable;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Lumen\Auth\Authorizable;

class antrianModel extends Model  
{
    // use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'nama', 'username', 'password', 'api_key'
    // ];

    protected $table = 'tb_antrian';
    protected $primaryKey = 'id_antrian';
    public $timestamps = false;
    protected $fillable = ['id_antrian','id_users','tgl_antrian','status_antrian','no_antrian','id_layanan','id_karyawan'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        // 'password'
    ];
}
