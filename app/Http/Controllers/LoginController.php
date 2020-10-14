<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Model\userModel;
// use App\userModel;
use Illuminate\Support\Str;

class LoginController extends Controller
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
        $data = userModel::all();
        return response()->json($data);
    }

    //tampil data karyawan
    public function list_karyawan()
    {
        $data = userModel::where('id_role', 2)->get();
        return response()->json($data);
    }

    //tampil data pelanggan
    public function list_pelanggan()
    {
        $data = userModel::where('id_role', 3)->get();
        return response()->json($data);
    }

    //Register admin
    public function register_admin(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap'  => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir'     => 'required',
            'email'         => 'required',
            'username'      => 'required',
            'password'      => 'required'
            ]);

        $id_role          = 1;
        $nama_lengkap     = $request->input('nama_lengkap');
        $jenis_kelamin    = $request->input('jenis_kelamin');
        $tgl_lahir        = $request->input('tgl_lahir');
        $email            = $request->input('email');
        $username         = $request->input('username');
        $password         = Hash::make($request->input('password'));

        if (userModel::where('username', '=', $username)->exists())
        {
            return response()->json([
                    'success'   => false,
                    'kode'      => 0,
                    'message'   => 'Username Sudah Terdaftar, gunakan username lainnya!',
                    'data'      => ''
                ], 400);
        }
        else{
            $register = userModel::create([
            'id_role'       => $id_role,
            'nama_lengkap'  => $nama_lengkap,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir'     => $tgl_lahir,
            'email'         => $email,
            'tgl_buat'      => \Carbon\Carbon::now(),
            'username'      => $username,
            'password'      => $password
            ]);

            if($register){
                return response()->json([
                    'success'   => true,
                    'kode'      => 1,
                    'message'   => "Register Success!",
                    'data'      => $register
                ], 201);
            }else{
                return response()->json([
                    'success'   => false,
                    'kode'      => 2,
                    'message'   => 'Register Failed!',
                    'data'      => ''
                ], 400);
            }
        }        
    }

     //Register karyawan
    public function register_karyawan(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap'  => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir'     => 'required',
            'email'         => 'required',
            'username'      => 'required',
            'password'      => 'required'
            ]);

        $id_role          = 2;
        $nama_lengkap     = $request->input('nama_lengkap');
        $jenis_kelamin    = $request->input('jenis_kelamin');
        $tgl_lahir        = $request->input('tgl_lahir');
        $email            = $request->input('email');
        $username         = $request->input('username');
        $password         = Hash::make($request->input('password'));

        if (userModel::where('username', '=', $username)->exists())
        {
            return response()->json([
                    'success'   => false,
                    'kode'      => 0,
                    'message'   => 'Username Sudah Terdaftar, gunakan username lainnya!',
                    'data'      => ''
                ], 400);
        }
        else{
            $register = userModel::create([
            'id_role'       => $id_role,
            'nama_lengkap'  => $nama_lengkap,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir'     => $tgl_lahir,
            'email'         => $email,
            'tgl_buat'      => \Carbon\Carbon::now(),
            'username'      => $username,
            'password'      => $password
            ]);

            if($register){
                return response()->json([
                    'success'   => true,
                    'kode'      => 1,
                    'message'   => "Register Success!",
                    'data'      => $register
                ], 201);
            }else{
                return response()->json([
                    'success'   => false,
                    'kode'      => 2,
                    'message'   => 'Register Failed!',
                    'data'      => ''
                ], 400);
            }
        }        
    }

    //Register pelanggan
    public function register_pelanggan(Request $request)
    {
        $this->validate($request, [
            // 'id_role'       => 'required',
            'nama_lengkap'  => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir'     => 'required',
            'alamat'        => 'required',
            'NIK'           => 'required|min:16|max:16',
            'no_telepon'    => 'required',
            'email'         => 'required',
            'username'      => 'required',
            'password'      => 'required'
            ]);

        $id_role          = 3;
        $nama_lengkap     = $request->input('nama_lengkap');
        $jenis_kelamin    = $request->input('jenis_kelamin');
        $tgl_lahir        = $request->input('tgl_lahir');
        $alamat           = $request->input('alamat');
        $NIK              = $request->input('NIK');
        $no_telepon       = $request->input('no_telepon');
        $email            = $request->input('email');
        $username         = $request->input('username');
        $password         = Hash::make($request->input('password'));

        if (userModel::where('username', '=', $username)->exists())
        {
            return response()->json([
                    'success'   => false,
                    'kode'      => 0,
                    'message'   => 'Username Sudah Terdaftar, gunakan username lainnya!',
                    'data'      => ''
                ], 400);
        }
        else{
            $register = userModel::create([
            'id_role'       => $id_role,
            'nama_lengkap'  => $nama_lengkap,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir'     => $tgl_lahir,
            'alamat'        => $alamat,
            'NIK'           => $NIK,
            'no_telepon'    => $no_telepon,
            'tgl_buat'      => \Carbon\Carbon::now(),
            'email'         => $email,
            'username'      => $username,
            'password'      => $password
            ]);

            if($register){
                return response()->json([
                    'success'   => true,
                    'kode'      => 1,
                    'message'   => "Register Success!",
                    'data'      => $register
                ], 201);
            }else{
                return response()->json([
                    'success'   => false,
                    'kode'      => 2,
                    'message'   => 'Register Failed!',
                    'data'      => ''
                ], 400);
            }
        }        
    }

    //edit profil karyawan
    public function edit_profil_karyawan(Request $request, $id_users)
    {
        $this->validate($request, [
            'password'      => 'max:30'
            ]);

        $nama_lengkap     = $request->input('nama_lengkap');
        $jenis_kelamin    = $request->input('jenis_kelamin');
        $tgl_lahir        = $request->input('tgl_lahir');
        $email            = $request->input('email');
        $username         = $request->input('username');
        $password         = Hash::make($request->input('password'));

        // $api_key = base64_encode(Str::random(40));
        if (userModel::where('username', '=', $username)->exists()) {
            return response()->json([
                'success'   => false,
                'message'   => 'Username Sudah Terdaftar, gunakan username lainnya!',
                'data'      => ''
            ], 400);
        }else{
            $user = userModel::find($id_users);
            $update = $user->update([
                
                'nama_lengkap'  => $nama_lengkap,
                'jenis_kelamin' => $jenis_kelamin,
                'tgl_lahir'     => $tgl_lahir,
                'email'         => $email,
                'username'      => $username,
                'password'      => $password
            ]);

            if($update){
                return response()->json([
                    'success'   => true,
                    'message'   => "Update Success!",
                    'data'      => $user
                ], 201);
            }else{
                return response()->json([
                    'success'   => false,
                    'message'   => 'Update Failed!',
                    'data'      => ''
                ], 400);
            }
        }
    }

    public function deleteProfile($id_users)
    {
        $user = userModel::find($id_users);
        $delete = $user->delete();

        if($delete){
            return response()->json([
                'success'   => true,
                'message'   => "Hapus Data Success!",
                'data'      => $user
            ], 201);
        }else{
            return response()->json([
                'success'   => false,
                'message'   => 'Hapus Data Failed!',
                'data'      => ''
            ], 400);
        }        
    }

    //function login admin
    public function login_admin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = userModel::where('username', $username)->first();

        if ($user) {
            if(Hash::check($password, $user->password) && $user->id_role == 1)
            {
                 $user->update([
                        'start_login' => \Carbon\Carbon::now()
                    ]);

                    return response()->json([
                        'success'   => true,
                        'kode'      => 1,
                        'message'   => 'Login Sebagai Admin',
                        'data'      => [
                            'id_admin'      => $user['id_users'],
                            'nama_lengkap'  => $user['nama_lengkap'],
                            'tgl_lahir'     => $user['tgl_lahir'],
                            'jenis_kelamin' => $user['jenis_kelamin'],
                            'username'      => $user['username'],
                            'start_login'   => $user->start_login
                        ]
                    ], 201);
            } else{
                return response()->json([
                    'success'   => false,
                    'kode'      => 2,
                    'message'   => 'Username dan Password salah!',
                    'data'      => ''
                ], 400);
            }
        } else{
            return response()->json([
                    'success'   => false,
                    'kode'      => 3,
                    'message'   => 'Username Belum Terdaftar',
                    'data'      => ''
                ], 400);
        }
    }

    //function login karyawan
    public function login_karyawan(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = userModel::where('username', $username)->first();

        if ($user) {
            if(Hash::check($password, $user->password) && $user->id_role == 2)
            {
                 $user->update([
                        'start_login' => \Carbon\Carbon::now()
                    ]);

                    return response()->json([
                        'success'   => true,
                        'kode'      => 1,
                        'message'   => 'Login Sebagai Karyawan',
                        'data'      => [
                            'id_karyawan'   => $user['id_users'],
                            'nama_lengkap'  => $user['nama_lengkap'],
                            'username'      => $user['username'],
                            'start_login'   => $user->start_login
                        ]
                    ], 201);
            } else{
                return response()->json([
                    'success'   => false,
                    'kode'      => 2,
                    'message'   => 'Username dan Password salah!',
                    'data'      => ''
                ], 400);
            }
        } else{
            return response()->json([
                    'success'   => false,
                    'kode'      => 3,
                    'message'   => 'Username Belum Terdaftar',
                    'data'      => ''
                ], 400);
        }
    }

    //function login pelanggan
    public function login_pelanggan(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = userModel::where('email', $email)->first();

        if ($user) {
            if(Hash::check($password, $user->password) && $user->id_role == 3 && $user->status_login == 0)
            {
                 $user->update([
                        'start_login' => \Carbon\Carbon::now(),
                        'status_login'=> 1
                    ]);

                    return response()->json([
                        'success'   => true,
                        'kode'      => 1,
                        'message'   => 'Login Sebagai User Pengunjung',
                        'data'      => [
                            'id_users'      => $user['id_users'],
                            'nama_lengkap'  => $user['nama_lengkap'],
                            'tgl_lahir'     => $user['tgl_lahir'],
                            'jenis_kelamin' => $user['jenis_kelamin'],
                            'email'         => $user['email'],
                            'password'      => $user['password'],
                            'status_login'  => $user->status_login,
                            'start_login'   => $user->start_login
                        ]
                    ], 201);
            } elseif($user->id_role == 3 && $user->status_login == 1){
                return response()->json([
                    'success'   => false,
                    'kode'      => 2,
                    'message'   => 'Anda Sudah Login!',
                    'data'      => ''
                ], 400);                
            } else{
                return response()->json([
                    'success'   => false,
                    'kode'      => 3,
                    'message'   => 'Email dan Password salah!',
                    'data'      => ''
                ], 400);
            }
        } else{
            return response()->json([
                    'success'   => false,
                    'kode'      => 3,
                    'message'   => 'Email Belum Terdaftar',
                    'data'      => ''
                ], 400);
        }
    }

    //logout pelanggan
    public function logout(Request $request)
    {
        $id_users = $request->input('id_users');
        $status_login = $request->input('status_login');

        $user = userModel::where('id_users',$id_users)->first();
        $update = $user->update([
                            'status_login'  => $status_login,
                            'end_login'     => \Carbon\Carbon::now()
                        ]);
        return response()->json([
            'success'   => true,
            'kode'      => 1,
            'message'   => 'Logout berhasil',
            'data'      => [
                        'id_users'      => $user['id_users'],
                        'nama_lengkap'  => $user['nama_lengkap'],
                        'tgl_lahir'     => $user['tgl_lahir'],
                        'jenis_kelamin' => $user['jenis_kelamin'],
                        'email'         => $user['email'],
                        'password'      => $user['password'],
                        'status_login'  => $user->status_login,
                        'start_login'   => $user->start_login,
                        'end_login'     => $user->end_login
            ]
        ], 201);
    }

    //edit password pelanggan
    public function edit_password_pelanggan(Request $request, $id_users)
    {
        $this->validate($request, [
            'password_lama' => 'required|max:30',
            'password_baru'      => 'required|max:30'
            ]);

        $pass = [
                'password_baru' => $request->input('password_baru'),
                'password_lama' => $request->input('password_lama')
        ];

        $user = userModel::find($id_users);
        $user2 = userModel::where('id_users', $id_users);
        $update = $user->update([
            'password'      => Hash::make($pass['password_baru'])
        ]);
        if ($user['id_role'] != 3) {
            return response()->json([
                'success'   => false,
                'kode'      => 0,
                'message'   => 'Ganti password sebagai pelanggan salah!',
                'data'      => ''
            ], 400);
        } else{
            if (!Hash::check($pass['password_lama'] , $user['password'])) {

                return response()->json([
                    'success'   => false,
                    'kode'      => 2,
                    'message'   => 'Password anda salah!',
                    'data'      => ''
                ], 400);        
            } else{
                if ($pass['password_lama'] == $pass['password_baru']) {
                    return response()->json([
                        'success'   => false,
                        'kode'      => 3,
                        'message'   => 'Password gak boleh sama!',
                        'data'      => ''
                    ], 400);
                } else {
                    if($update){
                        return response()->json([
                            'success'   => true,
                            'kode'      => 1,
                            'message'   => "Ganti Password Sukses!",
                            'data'      => [
                                    'id_pelanggan'  => $user['id_users'],
                                    'password'      => $user['password']
                            ]
                        ], 201);
                    }else{
                        return response()->json([
                            'success'   => false,
                            'kode'      => 3,
                            'message'   => 'Ganti Password Gagal!',
                            'data'      => ''
                        ], 400);
                    }
                }            
            }
        }       
    }
}
