<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Kepsek;
use App\Models\Guru;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        return view('pages.admin.guru.index', compact('guru'));
    }

    public function kelas($id)
    {
        $kelas = Kelas::find($id);
        $guru = Guru::with('kelas')->where('id_kelas', $id)->orderBy('id_kelas', 'asc')->get();

        return view('pages.admin.guru.kelas', compact('kelas', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        return view('pages.admin.guru.create', compact('kelas'));
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
            'agama'                 => 'required',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'nip'                   => 'required|numeric',
            'id_kelas'              => 'required',
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
            'agama.required'                => 'Agama Wajib Diisi',
            'tempat_lahir.required'         => 'Tempat Lahir Wajib Diisi',
            'tanggal_lahir.required'        => 'Tanggal Lahir Wajib Diisi',
            'nip.required'                  => 'NIP Wajib Diisi',
            'nip.numeric'                   => 'NIP Harus Berupa Angka',
            'id_kelas.required'             => 'Kelas Wajib Diisi',
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
            $image->move(public_path('uploads/guru'), $imageName);

            $user = User::create([
                'name' => $request->name,
                'avatar' => $imageName,
                'email' => $request->email,
                'level' => 'guru',
                'password' => password_hash($request->password, PASSWORD_BCRYPT, $options),
                'konfirmasi_password' => $request->konfirmasi_password
            ]);
    
            $input = $request->except(['name', 'avatar', 'email', 'password', 'konfirmasi_password']);
    
            Guru::create(array_merge($input, ['id_user' => $user->id]));
            
        }
        else {
            $foto = 'default.png';

            $user = User::create([
                'name' => $request->name,
                'avatar' => $foto,
                'email' => $request->email,
                'level' => 'guru',
                'password' => password_hash($request->password, PASSWORD_BCRYPT, $options),
                'konfirmasi_password' => $request->konfirmasi_password
            ]);
    
            $input = $request->except(['name', 'avatar', 'email', 'password', 'konfirmasi_password']);
    
            Guru::create(array_merge($input, ['id_user' => $user->id]));
        }

        Alert::success('Berhasil', 'Guru Berhasil Ditambahkan');
        return redirect('/guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::find($id);

        return view('pages.admin.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        return view('pages.admin.guru.edit', compact('guru', 'kelas'));
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
            'agama'                 => 'required',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'nip'                   => 'required|numeric',Rule::unique('gurus')->ignore($id),
            'id_kelas'              => 'required',
            'alamat'                => 'required',
            'no_hp'                 => 'required|numeric'
        ];

        $messages = [
            'name.required'                 => 'Nama Wajib Diisi',
            'jk.required'                   => 'Jenis Kelamin Wajib Diisi',
            'agama.required'                => 'Agama Wajib Diisi',
            'tempat_lahir.required'         => 'Tempat Lahir Wajib Diisi',
            'tanggal_lahir.required'        => 'Tanggal Lahir Wajib Diisi',
            'nip.required'                  => 'NIP Wajib Diisi',
            'nip.unique'                    => 'NIP Sudah Terdaftar',
            'nip.numeric'                   => 'NIP Harus Berupa Angka',
            'id_kelas.required'             => 'Kelas Wajib Diisi',
            'alamat.required'               => 'Alamat Wajib Diisi',
            'no_hp.required'                => 'Nomor Handphone Wajib Diisi',
            'no_hp.numeric'                 => 'Nomor Handphone Harus Berupa Angka'                 
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $guru = Guru::find($id);
        $guru->jk = $request->jk;
        $guru->agama = $request->agama;
        $guru->tempat_lahir = $request->tempat_lahir;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->nip = $request->nip;
        $guru->id_kelas = $request->id_kelas;
        $guru->alamat = $request->alamat;
        $guru->no_hp = $request->no_hp;
        $guru->save();

        $user = User::find($guru->id_user);
        $user->name = $request->name;
        $user->save();

        Alert::success('Berhasil', 'Guru Berhasil Diubah');
        return redirect('/guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        if($guru->jadwal()->count()) {
            Alert::error('Gagal', 'Guru Memiliki Data Terkait dengan Jadwal');
            return back();
        } else {
            $user = User::where('id', $guru->id_user)->delete();
            $guru->delete();
    
            Alert::success('Berhasil', 'Guru Berhasil Dihapus');
            return redirect('/guru');
        }

    }

    public function dataGuru()
    {
        $kepsek = Kepsek::where('id', 1)->first();
        $guru = Guru::all();
        return view('pages.homepage.guru', compact('guru', 'kepsek'));
    }

    public function detailGuru($id)
    {
        $guru = Guru::find($id);
        return view('pages.homepage.detail-guru', compact('guru'));
    }

    public function detailKepsek($id)
    {
        $kepsek = Kepsek::where('id', 1)->first();
        return view('pages.homepage.detail-kepsek', compact('kepsek'));
    }
}
