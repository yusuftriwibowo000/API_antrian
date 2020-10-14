<?php

namespace App\Model;

// use Illuminate\Auth\Authenticatable;
// use Illuminate\Contracts\Auth\Access\Authorizable;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Lumen\Auth\Authorizable;

class userModel extends Model  
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

    protected $table = 'tb_users';
    protected $primaryKey = 'id_users';
    public $timestamps = false;
    protected $fillable = ['id_role','nama_lengkap','jenis_kelamin','tgl_lahir','email','tgl_buat','start_login','end_login','username','password','status_login'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}
