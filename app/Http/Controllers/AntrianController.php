<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Model\antrianModel;
use Illuminate\Support\Str;

class AntrianController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    //Show data semua user
    public function index()
    {
        $data = antrianModel::all();
        return response()->json($data);
    }

    //tampil data antrian
    public function tambah_antrian(Request $request)
    {
        $id_users         = $request->input('id_users');
        $status_antrian   = $request->input('status_antrian');
        $id_layanan       = $request->input('id_layanan');
        $id_karyawan      = $request->input('id_karyawan');
        $results          = DB::table('tb_antrian')->whereDate('tgl_antrian','=', DB::raw('curdate()'))->max('id_antrian');
        $count            = $results + 1;

            $antri = antrianModel::create([
            'id_users'      => $id_users,
            'tgl_antrian'   => \Carbon\Carbon::now(),
            'status_antrian'=> $status_antrian,
            'no_antrian'    => $count,
            'id_layanan'    => $id_layanan,
            'id_karyawan'   => $id_karyawan
            ]);
        

            if($antri){
                return response()->json([
                    'success'   => true,
                    'kode'      => 1,
                    'message'   => "Sukses Tambah Antrian",
                    'data'      => $antri
                ], 201);
            }else{
                return response()->json([
                    'success'   => false,
                    'kode'      => 0,
                    'message'   => 'Gagal Tambah Antrian!',
                    'data'      => ''
                ], 400);
            }
    }
    
}
