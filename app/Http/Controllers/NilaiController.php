<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        return view('pages.admin.nilai.index', compact('kelas'));
    }

    public function kelas($id)
    {
        $kelas = Kelas::find($id);
        $murid = Murid::with('user')->where('id_kelas', $id)->orderby('user.name', 'asc')->get();

        return view('pages.admin.nilai.kelas', compact('kelas', 'murid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function murid($id)
    {
        $murid = Murid::find($id);
        $kelas = Kelas::find($murid->id_kelas);
        $jadwal = Jadwal::orderBy('id_mapel')->where('id_kelas', $kelas->id)->get();
        $mapel = $jadwal->groupBy('id_mapel');

        return view('pages.admin.nilai.create', compact('murid', 'kelas', 'mapel'));
    }

    public function create()
    {
        
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
}
