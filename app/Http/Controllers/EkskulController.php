<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Ekskul;
use App\Models\Guru;
use App\Models\Murid;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;


class EkskulController extends Controller
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
    
        return view('pages.admin.ekskul.index', compact('kelas'));
    }

    public function kelas($id)
    {
        $kelas = Kelas::find($id);
        $murid = Murid::with('user')->where('id_kelas', $id)->where('status_lulus', '0')->orderby('id_user', 'asc')->get();

        return view('pages.admin.ekskul.kelas', compact('kelas', 'murid'));
    }

    public function murid($id)
    {
        $murid = Murid::find($id);
        $ekskul = Ekskul::where('id_murid', $id)->get();

        return view('pages.admin.ekskul.murid', compact('murid', 'ekskul'));
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
            'eks1'                => 'required',
            'eks2'                => 'required',
            'eks3'                => 'required',
            'eks4'                => 'required',
            'eks5'                => 'required',
            'eks6'                => 'required',
            'eks7'                => 'required',
            'eks8'                => 'required',
        ];

        $messages = [
            'eks1.required'                   => 'Ekskul 1 Wajib Diisi',
            'eks2.required'                   => 'Ekskul 2 Wajib Diisi',
            'eks3.required'                   => 'Ekskul 3 Wajib Diisi',
            'eks4.required'                   => 'Ekskul 4 Wajib Diisi',
            'eks5.required'                   => 'Ekskul 5 Wajib Diisi',
            'eks6.required'                   => 'Ekskul 6 Wajib Diisi',
            'eks7.required'                   => 'Ekskul 7 Wajib Diisi',
            'eks8.required'                   => 'Ekskul 8 Wajib Diisi',
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
        if(Ekskul::where('id_murid', $murid->id)->where('id_kelas', $kelas->id)->exists()) {
            Alert::error('Gagal', 'Ekskul di Kelas Sudah Ada');

            return redirect()->back();
        }
        else {
            Ekskul::create($data);

            Alert::success('Berhasil', 'Nilai Ekskul Berhasil Diinput');

            return redirect()->back();
        }
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
