<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Kepsek;
use App\Models\Guru;
use App\Models\Murid;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function profile_show()
    {
        if(auth()->user()->level == 'admin') {
            $admin = Admin::where('id_user', auth()->user()->id)->first();
            return view('pages.profil.admin.index', compact('admin'));
        } else if(auth()->user()->level == 'kepsek') {
            $kepsek = Kepsek::where('id_user', auth()->user()->id)->first();
            return view('pages.profil.kepsek.index', compact('kepsek'));
        } else if(auth()->user()->level == 'guru') {
            $guru = Guru::where('id_user', auth()->user()->id)->first();
            return view('pages.profil.guru.index', compact('guru'));
        } else if(auth()->user()->level == 'murid') {
            $murid = Murid::where('id_user', auth()->user()->id)->first();
            $pekerjaan = Pekerjaan::all();
            $pendidikan = Pendidikan::all();
            return view('pages.profil.murid.index', compact('murid', 'pekerjaan', 'pendidikan'));
        }
    }

    public function post_profile(Request $request)
    {
        $data = $request->all();

        if(auth()->user()->level == 'admin') {
            $rules = [
                'name'                  => 'required',
                'jk'                    => 'required',
                'nip'                   => 'required|numeric',
                'alamat'                => 'required',
                'no_hp'                 => 'required|numeric'
            ];
    
            $messages = [
                'name.required'                 => 'Nama Wajib Diisi',
                'jk.required'                   => 'Jenis Kelamin Wajib Diisi',
                'nip.required'                  => 'Nomor Induk Pegawai Wajib Diisi',
                'nip.numeric'                   => 'Nomor Induk Pegawai Harus Berupa Angka',
                'alamat.required'               => 'Alamat Wajib Diisi',
                'no_hp.required'                => 'Nomor Handphone Wajib Diisi',
                'no_hp.numeric'                 => 'Nomor Handphone Harus Berupa Angka'                 
            ];
    
            $validator = Validator::make($request->all(), $rules, $messages);
    
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            $admin = Admin::where('id_user', auth()->user()->id)->first();
            $admin->jk = $request->jk;
            $admin->nip = $request->nip;
            $admin->alamat = $request->alamat;
            $admin->no_hp = $request->no_hp;
            $admin->save();

            $user = User::find($admin->id_user);
            $user->name = $request->name;
            $user->save();

        } else if(auth()->user()->level == 'kepsek') {
            $rules = [
                'name'                  => 'required',
                'jk'                    => 'required',
                'nik'                   => 'required|numeric',
                'nip'                   => 'required|numeric',
                'tempat_lahir'          => 'required',
                'tanggal_lahir'         => 'required',
                'agama'                 => 'required',
                'alamat'                => 'required',
                'no_hp'                 => 'required|numeric'
            ];
    
            $messages = [
                'name.required'                 => 'Nama Wajib Diisi',
                'jk.required'                   => 'Jenis Kelamin Wajib Diisi',
                'nik.required'                  => 'NIK Wajib Diisi', 
                'nip.required'                  => 'NIP Wajib Diisi',
                'nip.numeric'                   => 'NIP Harus Berupa Angka',
                'tempat_lahir.required'         => 'Tempat Lahir Wajib Diisi',
                'tanggal_lahir.required'        => 'Tanggal Lahir Wajib Diisi',
                'agama.required'                => 'Agama Wajib Diisi',
                'alamat.required'               => 'Alamat Wajib Diisi',
                'no_hp.required'                => 'Nomor Handphone Wajib Diisi',
                'no_hp.numeric'                 => 'Nomor Handphone Harus Berupa Angka'                 
            ];
    
            $validator = Validator::make($request->all(), $rules, $messages);
    
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            $kepsek = Kepsek::where('id_user', auth()->user()->id)->first();
            $kepsek->jk = $request->jk;
            $kepsek->nik = $request->nik;
            $kepsek->nip = $request->nip;
            $kepsek->tempat_lahir = $request->tempat_lahir;
            $kepsek->tanggal_lahir = $request->tanggal_lahir;
            $kepsek->agama = $request->agama;
            $kepsek->alamat = $request->alamat;
            $kepsek->no_hp = $request->no_hp;
            $kepsek->save();

            $user = User::find($kepsek->id_user);
            $user->name = $request->name;
            $user->save();
        } else if(auth()->user()->level == 'guru') {

            $rules = [
                'name'                  => 'required',
                'jk'                    => 'required',
                'nip'                   => 'required|numeric',
                'alamat'                => 'required',
                'no_hp'                 => 'required|numeric'
            ];
    
            $messages = [
                'name.required'                 => 'Nama Wajib Diisi',
                'jk.required'                   => 'Jenis Kelamin Wajib Diisi',
                'nip.required'                  => 'NIP Wajib Diisi',
                'nip.numeric'                   => 'NIP Harus Berupa Angka',
                'alamat.required'               => 'Alamat Wajib Diisi',
                'no_hp.required'                => 'Nomor Handphone Wajib Diisi',
                'no_hp.numeric'                 => 'Nomor Handphone Harus Berupa Angka'                 
            ];
    
            $validator = Validator::make($request->all(), $rules, $messages);
    
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            $guru = Guru::where('id_user', auth()->user()->id)->first();
            $guru->jk = $request->jk;
            $guru->nip = $request->nip;
            $guru->alamat = $request->alamat;
            $guru->no_hp = $request->no_hp;
            $guru->save();

            $user = User::find($guru->id_user);
            $user->name = $request->name;
            $user->save();
        } else if(auth()->user()->level == 'murid') {
            $rules = [
                'name'                  => 'required',
                'nisn'                  => Rule::unique('murids')->ignore(Murid::where('id_user', auth()->user()->id)->first()),
                'nis'                   => Rule::unique('murids')->ignore(Murid::where('id_user', auth()->user()->id)->first()),  
                'nik'                   => 'required',Rule::unique('murids')->ignore(Murid::where('id_user', auth()->user()->id)->first()),       
                'jk'                    => 'required',
                'agama'                 => 'required',
                'tempat_lahir'          => 'required|string',
                'tanggal_lahir'         => 'required|date',
                'nik_ayah'              => 'required|numeric',
                'nik_ibu'               => 'required|numeric',
                'nama_ayah'             => 'required',
                'nama_ibu'              => 'required',
                'pekerjaan_ayah'        => 'required',
                'pekerjaan_ibu'         => 'required',
                'pendidikan_ayah'       => 'required',
                'pendidikan_ibu'        => 'required',
                'alamat'                => 'required',
                'no_hp'                 => 'required|numeric'
            ];
    
            $messages = [
                'name.required'                 => 'Nama Wajib Diisi',
                'nisn.unique'                   => 'NISN Sudah Terdaftar',
                'nis.unique'                    => 'NIS Sudah Terdaftar',
                'nik.required'                  => 'NIK Wajib Diisi',
                'nik.unique'                    => 'NIK Sudah Terdaftar',
                'jk.required'                   => 'Jenis Kelamin Wajib Diisi',
                'agama.required'                => 'Agama Wajib Diisi',
                'tempat_lahir.required'         => 'Tempat Lahir Wajib Diisi',
                'tanggal_lahir.required'        => 'Tanggal Lahir Wajib Diisi',
                'nik_ayah.required'             => 'NIK Ayah Wajib Diisi',
                'nik_ibu.required'              => 'NIK Ibu Wajib Diisi',
                'nama_ayah.required'            => 'Nama Ayah Wajib Diisi',
                'nama_ibu.required'             => 'Nama Ibu Wajib Diisi',
                'pekerjaan_ayah.required'       => 'Pekerjaan Ayah Wajib Diisi',
                'pekerjaan_ibu.required'        => 'Pekerjaan Ibu Wajib Diisi',
                'pendidikan_ayah.required'      => 'Pendidikan Ayah Wajib Diisi',
                'pendidikan_ibu.required'       => 'Pendidikan Ibu Wajib Diisi',   
                'alamat.required'               => 'Alamat Wajib Diisi',
                'no_hp.required'                => 'Nomor Handphone Wajib Diisi',
                'no_hp.numeric'                 => 'Nomor Handphone Harus Berupa Angka'                 
            ];
    
            $validator = Validator::make($request->all(), $rules, $messages);
    
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
    
            $murid = Murid::where('id_user', auth()->user()->id)->first();
            $murid->nisn = $request->nisn;
            $murid->nis = $request->nis;
            $murid->nik = $request->nik;
            $murid->jk = $request->jk;
            $murid->agama = $request->agama;
            $murid->tempat_lahir = $request->tempat_lahir;
            $murid->tanggal_lahir = $request->tanggal_lahir;
            $murid->nik_ayah = $request->nik_ayah;
            $murid->nik_ibu = $request->nik_ibu;
            $murid->nama_ayah = $request->nama_ayah;
            $murid->nama_ibu = $request->nama_ibu;
            $murid->pekerjaan_ayah = $request->pekerjaan_ayah;
            $murid->pekerjaan_ibu = $request->pekerjaan_ibu;
            $murid->pendidikan_ayah = $request->pendidikan_ayah;
            $murid->pendidikan_ibu = $request->pendidikan_ibu;
            $murid->alamat = $request->alamat;
            $murid->no_hp = $request->no_hp;
            $murid->save();
    
            $user = User::find($murid->id_user);
            $user->name = $request->name;
            $user->save();
        }

        Alert::success('Berhasil', 'Ubah Profil Berhasil');
        return redirect('/profil');
    }

    public function ubah_avatar(Request $request)
    {
        $rules = [
            'avatar'                => 'required|image|mimes:jpeg,png,jpg,svg',
        ];

        $messages = [
            'avatar.required'                 => 'Foto Wajib Diisi',
            'avatar.mimes'                    => 'Foto harus berformat gambar (jpeg, png, jpg atau svg)',        
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        if(auth()->user()->level == 'admin') {
            $user = User::where('id', auth()->user()->id)->first();
            $image = $request->file('avatar');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('uploads/admin'),$imageName);
            $data['avatar'] = $imageName;

            $user->update($data);

        } else if(auth()->user()->level == 'kepsek') {
            $user = User::where('id', auth()->user()->id)->first();
            $image = $request->file('avatar');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('uploads/kepsek'),$imageName);
            $data['avatar'] = $imageName;

            $user->update($data);

        } else if(auth()->user()->level == 'guru') {
            $user = User::where('id', auth()->user()->id)->first();
            $image = $request->file('avatar');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('uploads/guru'),$imageName);
            $data['avatar'] = $imageName;

            $user->update($data);

        } else if(auth()->user()->level == 'murid') {
            $user = User::where('id', auth()->user()->id)->first();
            $image = $request->file('avatar');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('uploads/murid'),$imageName);
            $data['avatar'] = $imageName;

            $user->update($data);
        }

        Alert::success('Berhasil', 'Ubah Avatar Berhasil Dilakukan');

        return redirect('/profil');
    }

    public function user_setting()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('pages.user.index', compact('user'));
    }

    public function post_user(Request $request)
    {
        $rules = [
            'password'             => 'required',
            'password_baru'        => 'required|min:8|same:password_baru2',
            'password_baru2'       => 'required|min:8',
        ];

        $messages = [
            'password.required'             => 'Password Wajib diisi',
            'password.min'                  => 'Password minimal 8 karakter',
            'password_baru.required'        => 'Password Baru wajib diisi',
            'password_baru.same'            => 'Password Baru Harus Sama Dengan Password yang Dimasukkan Ulang',
            'password_baru.min'             => 'Password Baru minimal 8 karakter',
            'password_baru2.required'       => 'Password yang Dimasukkan Ulang wajib diisi',
            'password_baru2.min'            => 'Password yang Dimasukkan Ulang minimal 8 karakter',              
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user = User::where('id', auth()->user()->id)->first();
        $options = [
            'cost' => 11 // parameter untuk algoritma enkripsi BLOWFISH
        ];
        
        if($user->konfirmasi_password == $request->password) {
            $user = User::where('id', auth()->user()->id)->where('konfirmasi_password', $request->password)
                    ->update([
                        'password' => password_hash($request->password_baru, PASSWORD_BCRYPT, $options),
                        'konfirmasi_password' => $request->password_baru,
                    ]);
            Alert::success('Berhasil', 'Ganti Password Berhasil');

        } else {
            Alert::error('Gagal', 'Ganti Password Gagal Karena Passoword Lama Tidak Sesuai');
        }

        return redirect('/akun');

    }
}
