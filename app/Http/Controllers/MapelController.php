<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();

        return view('pages.admin.mapel.index', compact('mapel'));
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
            'nama_mapel'            => 'required',
        ];

        $messages = [
            'nama_mapel.required'   => 'Nama Mapel Wajib Diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        Mapel::create($data);

        Alert::success('Berhasil', 'Mapel Berhasil Ditambahkan');
        return redirect('/mapel');
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
        $mapel = Mapel::find($id);

        return view('pages.admin.mapel.edit', compact('mapel'));
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
            'nama_mapel'            => 'required',
        ];

        $messages = [
            'nama_mapel.required'   => 'Nama Mapel Wajib Diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $mapel = Mapel::find($id);
        $mapel->update($data);

        Alert::success('Berhasil', 'Mapel Berhasil Diubah');
        return redirect('/mapel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Mapel::find($id);
        if($mapel->jadwal()->count()) {
            Alert::error('Gagal', 'Mapel Memiliki Data Terkait dengan Jadwal');
            return back();
        } else if ($mapel->nilai()->count()) {
            Alert::error('Gagal', 'Mapel Memiliki Data Terkait dengan Nilai Murid');
            return back();
        } else if ($mapel->sikap()->count()) {
            Alert::error('Gagal', 'Mapel Memiliki Data Terkait dengan Sikap Murid');
            return back();
        } else if ($mapel->rapor()->count()) {
            Alert::error('Gagal', 'Mapel Memiliki Data Terkait dengan Rapor Murid');
            return back();
        } else {
            $mapel->delete();

            Alert::success('Berhasil', 'Mapel Berhasil Dihapus');
            return redirect('/mapel');
        }

    }
}
