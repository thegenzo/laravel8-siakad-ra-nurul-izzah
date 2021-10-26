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
        $murid = Murid::with('user')->where('id_kelas', $id)->orderBy('user.name', 'asc')->get();
        $kelas = Kelas::find($id);

        return view('pages.admin.murid.index', compact('murid', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'password' => password_hash($request->password, BCRYPT_BLOWFISH),
                'konfirmasi_password' => $request->konfirmasi_password
            ]);
    
            $input = $request->except(['name', 'avatar', 'email', 'password', 'konfirmasi_password']);
    
            Murid::create(array_merge($input, ['id_user' => $user->id]));
            
        }
        else {
            $foto = 'uploads/murid/default.png';

            $user = User::create([
                'name' => $request->name,
                'avatar' => $foto,
                'email' => $request->email,
                'level' => 'murid',
                'password' => password_hash($request->password, BCRYPT_BLOWFISH),
                'konfirmasi_password' => $request->konfirmasi_password
            ]);
    
            $input = $request->except(['name', 'avatar', 'email', 'password', 'konfirmasi_password']);
    
            Murid::create(array_merge($input, ['id_user' => $user->id]));
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

        return view('pages.admin.murid.edit', compact('murid', 'kelas'));
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

        $murid = Murid::find($id);
        $murid->jk = $request->jk;
        $murid->tempat_lahir = $request->tempat_lahir;
        $murid->tanggal_lahir = $request->tanggal_lahir;
        $murid->id_kelas = $request->id_kelas;
        $murid->nama_ortu = $request->nama_ortu;
        $murid->pekerjaan_ortu = $request->pekerjaan_ortu;
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
}