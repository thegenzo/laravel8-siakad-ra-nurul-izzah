<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sikap;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Mapel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class SikapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->level == 'admin' || auth()->user()->level == 'kepsek') {
            $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        } else {
            $guru = Guru::where('id_user', auth()->user()->id)->first();
            $kelas = Kelas::where('id', $guru->id_kelas)->first();
        }
    
        return view('pages.admin.sikap.index', compact('kelas'));
    }

    public function kelas($id)
    {
        $kelas = Kelas::find($id);
        $murid = Murid::with('user')->where('id_kelas', $id)->where('status_lulus', '0')->orderby('id_user', 'asc')->get();

        return view('pages.admin.sikap.kelas', compact('kelas', 'murid'));
    }

    public function murid($id)
    {
        $murid = Murid::find($id);
        $mapel = Mapel::all();
        $sikap = Sikap::where('id_murid', $id)->get();

        $sikapData = [];
        foreach($sikap as $data) {
            $sikapData = Sikap::where('id', '!=', $data->id_mapel)->get();
        }

        return view('pages.admin.sikap.murid', compact('murid', 'mapel', 'sikap', 'sikapData'));
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
        $rules = [
            'id_mapel'              => 'required',
            'sikap1'                => 'required',
            'sikap2'                => 'required',
            'sikap3'                => 'required',
        ];

        $messages = [
            'id_mapel.required'                 => 'Mapel Wajib Diisi',
            'sikap1.required'                   => 'Sikap 1 Wajib Diisi',
            'sikap2.required'                   => 'Sikap 2 Wajib Diisi',
            'sikap3.required'                   => 'Sikap 3 Wajib Diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $murid = Murid::find($id);
        $kelas = Kelas::where('id', $murid->id_kelas)->first();
        $data = $request->all();
        $data['id_murid'] = $murid->id;
        $data['id_kelas'] = $murid->kelas->id;
        Sikap::create($data);

        Alert::success('Berhasil', 'Sikap Murid Berhasil Diinput');

        return redirect()->back();
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
