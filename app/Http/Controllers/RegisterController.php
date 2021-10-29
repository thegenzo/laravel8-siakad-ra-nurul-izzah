<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Murid;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function registrasiMurid()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        return view('auth.register', compact('kelas'));
    }

    public function enroll(Request $request)
    {
        $rules = [
            'name'                  => 'required',
            'avatar'                => 'image|mimes:jpeg,png,jpg,svg',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'   => 'required|min:8',
            'jk'                    => 'required',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'id_kelas'              => 'required',
            'nama_ortu'             => 'required',
            'pekerjaan_ortu'        => 'required',
            'alamat'                => 'required',
            'no_hp'                 => 'required|numeric'
        ];

        $messages = [
            'name.required'                 => 'Nama Wajib Diisi',
            'avatar.mimes'                  => 'Foto harus berformat gambar (jpeg, png, jpg atau svg)',
            'email.required'                => 'Email wajib diisi',
            'email.email'                   => 'Email tidak valid',
            'email.unique'                  => 'Email sudah terdaftar',
            'password.required'             => 'Password Wajib diisi',
            'password.min'                  => 'Password minimal 8 karakter',
            'password.same'                 => 'Konfirmasi Password Harus Sama Dengan Password',
            'konfirmasi_password.required'  => 'Konfirmasi password wajib diisi',
            'konfirmasi_password.min'       => 'Konfirmasi password minimal 8 karakter',
            'jk.required'                   => 'Jenis Kelamin Wajib Diisi',
            'tempat_lahir.required'         => 'Tempat Lahir Wajib Diisi',
            'tanggal_lahir.required'        => 'Tanggal Lahir Wajib Diisi',
            'id_kelas.required'             => 'Kelas Wajib Diisi',
            'nama_ortu.required'            => 'Nama Orang Tua Wajib Diisi',
            'pekerjaan_ortu.required'       => 'Pekerjaan Tua Wajib Diisi',
            'alamat.required'               => 'Alamat Wajib Diisi',
            'no_hp.required'                => 'Nomor Handphone Wajib Diisi',
            'no_hp.numeric'                 => 'Nomor Handphone Harus Berupa Angka'                 
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $options = [
            'cost' => 11 // parameter untuk algoritma enkripsi BLOWFISH
        ];

        if($request->avatar) {
            // proses mengupload foto profil
            $image = $request->file('avatar');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('uploads/murid'), $imageName);

            $user = User::create([
                'name' => $request->name,
                'avatar' => $imageName,
                'email' => $request->email,
                'level' => 'murid',
                'password' => password_hash($request->password, PASSWORD_BCRYPT, $options),
                'konfirmasi_password' => $request->konfirmasi_password
            ]);
    
            $input = $request->except(['name', 'avatar', 'email', 'password', 'konfirmasi_password']);
    
            Murid::create(array_merge($input, ['id_user' => $user->id], ['status_lulus' => '0']));
            
        }
        else {
            $foto = 'default.png';

            $user = User::create([
                'name' => $request->name,
                'avatar' => $foto,
                'email' => $request->email,
                'level' => 'murid',
                'password' => password_hash($request->password, PASSWORD_BCRYPT, $options),
                'konfirmasi_password' => $request->konfirmasi_password
            ]);
    
            $input = $request->except(['name', 'avatar', 'email', 'password', 'konfirmasi_password']);
    
            Murid::create(array_merge($input, ['id_user' => $user->id], ['status_lulus' => '0']));
        }

        Alert::success('Berhasil', 'Registrasi Murid Berhasil, Silahkan Login');
        return redirect('/login');
    }
}
