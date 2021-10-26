<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Hari;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Guru;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        $hari = Hari::all();
        $mapel = Mapel::all();
        $guru = Guru::with('user')->orderBy('user.name', 'asc')->get();

        return view('pages.admin.jadwal.index', compact('kelas', 'hari', 'mapel', 'guru'));
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
            'id_hari'       => 'required',
            'id_kelas'      => 'required',
            'id_mapel'      => 'required',
            'id_guru'       => 'required',
            'jam_mulai'     => 'required',
            'jam_selesai'   => 'required',
        ];

        $messages = [
            'id_hari.required'      => 'Hari Wajib Diisi',
            'id_kelas.required'     => 'Kelas Wajib Diisi',
            'id_mapel.required'     => 'Mata Pelajaran Wajib Diisi',
            'id_guru.required'      => 'Guru Wajib Diisi',
            'jam_mulai.required'    => 'Jam Mulai Wajib Diisi',
            'jam_selesai.required'  => 'Jam Selesai Wajib Diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        Jadwal::create($data);

        Alert::success('Berhasil', 'Jadwal Berhasil Ditambahkan');
        return redirect('/jadwal');
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
        $jadwal = Jadwal::find($id);

        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        $hari = Hari::all();
        $mapel = Mapel::all();
        $guru = Guru::with('user')->orderBy('user.name', 'asc')->get();

        return view('pages.admin.jadwal.edit', compact('jadwal', 'kelas', 'hari', 'mapel', 'guru'));
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
            'id_hari'       => 'required',
            'id_kelas'      => 'required',
            'id_mapel'      => 'required',
            'id_guru'       => 'required',
            'jam_mulai'     => 'required',
            'jam_selesai'   => 'required',
        ];

        $messages = [
            'id_hari.required'      => 'Hari Wajib Diisi',
            'id_kelas.required'     => 'Kelas Wajib Diisi',
            'id_mapel.required'     => 'Mata Pelajaran Wajib Diisi',
            'id_guru.required'      => 'Guru Wajib Diisi',
            'jam_mulai.required'    => 'Jam Mulai Wajib Diisi',
            'jam_selesai.required'  => 'Jam Selesai Wajib Diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $jadwal = Jadwal::find($id);
        $data = $request->all();
        $jadwal->update($data);

        Alert::success('Berhasil', 'Jadwal Berhasil Diubah');
        return redirect('/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();

        Alert::success('Berhasil', 'Jadwal Berhasil Dihapus');
        return redirect('/jadwal');
    }
}
