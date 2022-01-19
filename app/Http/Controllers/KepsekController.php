<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepsek;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class KepsekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepsek = Kepsek::all();

        return view('pages.admin.kepsek.index', compact('kepsek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kepsek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'                  => 'required',
            'avatar'                => 'image|mimes:jpeg,png,jpg,svg',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'   => 'required|min:8',
            'jk'                    => 'required',
            'nip'                   => 'required|numeric',
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

        if($request->avatar) {
            // proses mengupload foto profil
            $image = $request->file('avatar');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('uploads/kepsek'), $imageName);

            $user = User::create([
                'name' => $request->name,
                'avatar' => $imageName,
                'email' => $request->email,
                'level' => 'kepsek',
                'password' => password_hash($request->password, BCRYPT_BLOWFISH),
                'konfirmasi_password' => $request->konfirmasi_password
            ]);
    
            $input = $request->except(['name', 'avatar', 'email', 'password', 'konfirmasi_password']);
    
            Kepsek::create(array_merge($input, ['id_user' => $user->id]));
            
        }
        else {
            $foto = 'uploads/kepsek/default.png';

            $user = User::create([
                'name' => $request->name,
                'avatar' => $foto,
                'email' => $request->email,
                'level' => 'kepsek',
                'password' => password_hash($request->password, BCRYPT_BLOWFISH),
                'konfirmasi_password' => $request->konfirmasi_password
            ]);
    
            $input = $request->except(['name', 'avatar', 'email', 'password', 'konfirmasi_password']);
    
            Kepsek::create(array_merge($input, ['id_user' => $user->id]));
        }

        Alert::success('Berhasil', 'Kepala Sekolah Berhasil Dibuat');
        return redirect('/kepsek');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kepsek = Kepsek::find($id);

        return view('pages.admin.kepsek.edit', compact('kepsek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

        $kepsek = Kepsek::find($id);
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

        Alert::success('Berhasil', 'Kepala Sekolah Berhasil Diedit');
        return redirect('/kepsek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kepsek = Kepsek::find($id);
        $user = User::where('id', $kepsek->id_user)->delete();
        $kepsek->delete();

        Alert::success('Berhasil', 'Kepala Sekolah Berhasil Dihapus');
        return redirect('/kepsek');
    }
}
