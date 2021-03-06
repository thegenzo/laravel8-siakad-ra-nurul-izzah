<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Sikap;
use App\Models\Rapor;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Murid;
use App\Models\Ekskul;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;


class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        return view('pages.admin.murid.index', compact('kelas'));
    }

    public function kelas($id)
    {
        $murid = Murid::where('id_kelas', $id)->where('status_lulus', '0')->get();
        $kelas = Kelas::find($id);

        return view('pages.admin.murid.kelas', compact('murid', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        $pekerjaan = Pekerjaan::all();
        $pendidikan = Pendidikan::all();

        return view('pages.admin.murid.create', compact('kelas', 'pekerjaan', 'pendidikan'));
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
            'nisn'                  => 'unique:murids',
            'nis'                   => 'unique:murids',  
            'nik'                   => 'required|numeric|unique:murids',       
            'jk'                    => 'required',
            'agama'                 => 'required',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'id_kelas'              => 'required',
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
            'avatar.mimes'                  => 'Foto harus berformat gambar (jpeg, png, jpg atau svg)',
            'email.required'                => 'Email wajib diisi',
            'email.email'                   => 'Email tidak valid',
            'email.unique'                  => 'Email sudah terdaftar',
            'password.required'             => 'Password Wajib diisi',
            'password.min'                  => 'Password minimal 8 karakter',
            'password.same'                 => 'Konfirmasi Password Harus Sama Dengan Password',
            'konfirmasi_password.required'  => 'Konfirmasi password wajib diisi',
            'konfirmasi_password.min'       => 'Konfirmasi password minimal 8 karakter',
            'nisn.unique'                   => 'NISN Sudah Terdaftar',
            'nis.unique'                    => 'NIS Sudah Terdaftar',
            'nik.required'                  => 'NIK Wajib Diisi',
            'nik.unique'                    => 'NIK Sudah Terdaftar',
            'jk.required'                   => 'Jenis Kelamin Wajib Diisi',
            'agama.required'                => 'Agama Wajib Diisi',
            'tempat_lahir.required'         => 'Tempat Lahir Wajib Diisi',
            'tanggal_lahir.required'        => 'Tanggal Lahir Wajib Diisi',
            'id_kelas.required'             => 'Kelas Wajib Diisi',
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

        Alert::success('Berhasil', 'Murid Berhasil Ditambahkan');
        return redirect('/murid');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $murid = Murid::find($id);

        return view('pages.admin.murid.show', compact('murid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $murid = Murid::find($id);
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        $pekerjaan = Pekerjaan::all();
        $pendidikan = Pendidikan::all();

        return view('pages.admin.murid.edit', compact('murid', 'kelas', 'pekerjaan', 'pendidikan'));
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
            'nisn'                  => Rule::unique('murids')->ignore($id),
            'nis'                   => Rule::unique('murids')->ignore($id),  
            'nik'                   => 'required',Rule::unique('murids')->ignore($id),       
            'jk'                    => 'required',
            'agama'                 => 'required',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'id_kelas'              => 'required',
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
            'id_kelas.required'             => 'Kelas Wajib Diisi',
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

        $murid = Murid::find($id);
        $murid->nisn = $request->nisn;
        $murid->nis = $request->nis;
        $murid->nik = $request->nik;
        $murid->jk = $request->jk;
        $murid->agama = $request->agama;
        $murid->tempat_lahir = $request->tempat_lahir;
        $murid->tanggal_lahir = $request->tanggal_lahir;
        $murid->id_kelas = $request->id_kelas;
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

        Alert::success('Berhasil', 'Murid Berhasil Diedit');
        return redirect('/murid');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $murid = Murid::find($id);
        if($murid->nilai()->count()) {
            Alert::error('Gagal', 'Murid Memiliki Data Terkait dengan Nilai Murid');
            return back();
        } else if ($murid->sikap()->count()) {
            Alert::error('Gagal', 'Murid Memiliki Data Terkait dengan Sikap Murid');
            return back();
        } else if ($murid->rapor()->count()) {
            Alert::error('Gagal', 'Murid Memiliki Data Terkait dengan Rapor Murid');
            return back();
        } else if ($murid->ekskul()->count()) {
            Alert::error('Gagal', 'Murid Memiliki Data Terkait dengan Ekskul Murid');
            return back();
        } else {
            $user = User::where('id', $murid->id_user)->delete();
            $murid->delete();
    
            Alert::success('Berhasil', 'Murid Berhasil Dihapus');
            return redirect('/murid');
        }
    }

    // untuk melihat murid alumni
    public function alumni()
    {
        $alumni = Murid::where('status_lulus', 1)->get();

        return view('pages.admin.murid.alumni', compact('alumni'));
    }

    // melihat rapor alumni
    public function alumni_rapor($id)
    {
        $rapor = Rapor::where('id_murid', $id)->get();
        $murid = Murid::where('id', $id)->first();
        return view('pages.admin.murid.alumni-rapor', compact('rapor', 'murid'));
    }

    // nilai_saya
    // sikap_saya
    // rapor_saya
    // diakses oleh user dengan level murid untuk mengecek nilai, sikap dan rapor

    public function nilai_saya()
    {
        $data = auth()->user()->id;
        $murid = Murid::where('id_user', $data)->first();
        $nilai = Nilai::where('id_murid', $murid->id)->get();

        return view('pages.murid.nilai', compact('nilai'));
    }

    public function sikap_saya()
    {
        $data = auth()->user()->id;
        $murid = Murid::where('id_user', $data)->first();
        $sikap = Sikap::where('id_murid', $murid->id)->get();

        return view('pages.murid.sikap', compact('sikap'));
    }

    public function rapor_saya()
    {
        $data = auth()->user()->id;
        $murid = Murid::where('id_user', $data)->first();
        $nilai = Nilai::where('id_murid', $murid->id)->get();
        $sikap = Sikap::where('id_murid', $murid->id)->get();
        $rapor = Rapor::where('id_murid', $murid->id)->get();
        $ekskul = Ekskul::where('id_murid', $murid->id)->get();

        return view('pages.murid.rapor', compact('rapor', 'nilai', 'sikap', 'murid', 'ekskul'));
    }

    // pilih_kelas
    // update_kelas
    // untuk membagi kelas murid yang belum memiliki kelas belajar

    public function pilih_kelas()
    {
        $murid = Murid::where('id_kelas', null)->where('status_lulus', '0')->get();
        $kelas = Kelas::all();

        return view('pages.admin.murid.pilih-kelas', compact('murid', 'kelas'));
    }

    public function update_kelas(Request $request, $id)
    {
        $murid = Murid::find($id);
        $murid->id_kelas = $request->id_kelas;
        $murid->save();

        Alert::success('Berhasil', 'Kelas Berhasil Dipilih');

        return back();
    }


}
