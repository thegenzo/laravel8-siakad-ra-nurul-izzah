<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
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

        return redirect()->back()->with('success', 'Mapel Berhasil Ditambahkan');
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

        return redirect()->back()->with('success', 'Mapel Berhasil Diedit');
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
            return redirect()->back()->with('error', 'Mapel Memiliki Data Terkait dengan Jadwal');
        } else if ($mapel->nilai()->count()) {
            return redirect()->back()->with('error', 'Mapel Memiliki Data Terkait dengan Nilai Murid');
        } else if ($mapel->sikap()->count()) {
            return redirect()->back()->with('error', 'Mapel Memiliki Data Terkait dengan Sikap Murid');
        } else if ($mapel->rapor()->count()) {
            return redirect()->back()->with('error', 'Mapel Memiliki Data Terkait dengan Rapor Murid');
        } else {
            $mapel->delete();

            return redirect()->back()->with('success', 'Mapel Berhasil Dihapus');
        }

    }
}
