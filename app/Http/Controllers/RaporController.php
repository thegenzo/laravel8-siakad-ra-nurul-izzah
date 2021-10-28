<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapor;
use App\Models\Nilai;
use App\Models\Sikap;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Mapel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class RaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        return view('pages.admin.rapor.index', compact('kelas'));
    }

    public function kelas($id)
    {
        $kelas = Kelas::find($id);
        $murid = Murid::with('user')->where('id_kelas', $id)->where('status_lulus', '0')->orderby('id_user', 'asc')->get();

        return view('pages.admin.rapor.kelas', compact('kelas', 'murid'));
    }

    public function murid($idKelas, $id) // menggunakan 2 parameter karena untuk mendapatkan id kelas dan id murid,
    {                                   // karenan nantinya ada 2 rapor jika murid memutuskan untuk lanjut dari kelas A ke kelas B
        $murid = Murid::find($id);
        $kelas = Kelas::where('id', $idKelas)->first();
        $nilai = Nilai::where('id_murid', $id)->get();
        $sikap = Sikap::where('id_murid', $id)->get();
        $rapor = Rapor::where('id_murid', $id)->get();

        return view('pages.admin.rapor.murid', compact('murid', 'nilai', 'sikap', 'rapor', 'kelas'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postRapor(Request $request, $idKelas, $id)
    {
        $rules = [
            'nem'               => 'required',
            'predikat'          => 'required',
            'deskripsi'         => 'required',
            'status'            => 'required',
        ];

        $messages = [
            'nem.required'           => 'NEM Wajib Diisi',
            'predikat.required'      => 'Predikat Wajib Diisi',
            'deskripsi.required'     => 'Deskripsi Wajib Diisi',
            'status.required'        => 'Status Wajib Diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $murid = Murid::find($id);
        $kelas = Kelas::where('id', $idKelas)->first();
        
        if($request->status == 'Pindah di Kelas B1') {
            $data = $request->all();
            $data['id_murid'] = $murid->id;
            $data['id_kelas'] = Kelas::where('id', 2)->first()->id;
            Rapor::create($data);

            // proses pindah kelas
            Murid::where('id', $id)->update(['id_kelas' => 2]);

        } else if($request->status == 'Pindah di Kelas B2') {
            $data = $request->all();
            $data['id_murid'] = $murid->id;
            $data['id_kelas'] = Kelas::where('id', 3)->first()->id;
            Rapor::create($data);

            // proses pindah kelas
            Murid::where('id', $id)->update(['id_kelas' => 3]);

        } else { // jika ingin lulus
            $data = $request->all();
            $data['id_murid'] = $murid->id;
            $data['id_kelas'] = $kelas->id;
            Rapor::create($data);
        }

        Alert::success('Berhasil', 'Pengisian Rapor Berhasil Dilakukan');
        return redirect()->back();

    }
}
