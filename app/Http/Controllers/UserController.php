<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Kepsek;
use App\Models\Guru;
use App\Models\Murid;
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
            return view('pages.profil.murid.index', compact('murid'));
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

            $kepsek = Kepsek::where('id_user', auth()->user()->id)->first();
            $kepsek->jk = $request->jk;
            $kepsek->nip = $request->nip;
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
                'jk'                    => 'required',
                'tempat_lahir'          => 'required|string',
                'tanggal_lahir'         => 'required|date',
                'nama_ortu'             => 'required',
                'pekerjaan_ortu'        => 'required',
                'alamat'                => 'required',
                'no_hp'                 => 'required|numeric'
            ];
    
            $messages = [
                'name.required'                 => 'Nama Wajib Diisi',
                'jk.required'                   => 'Jenis Kelamin Wajib Diisi',
                'tempat_lahir.required'         => 'Tempat Lahir Wajib Diisi',
                'tanggal_lahir.required'        => 'Tanggal Lahir Wajib Diisi',
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
            $murid = Murid::where('id_user', auth()->user()->id)->first();
            $murid->jk = $request->jk;
            $murid->tempat_lahir = $request->tempat_lahir;
            $murid->tanggal_lahir = $request->tanggal_lahir;
            $murid->nama_ortu = $request->nama_ortu;
            $murid->pekerjaan_ortu = $request->pekerjaan_ortu;
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
