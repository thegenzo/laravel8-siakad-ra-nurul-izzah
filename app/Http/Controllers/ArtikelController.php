<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();

        return view('pages.admin.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.artikel.create');
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
            'sampul_artikel'        => 'required|image|mimes:jpeg,png,jpg,svg',
            'judul_artikel'         => 'required',
            'deskripsi'             => 'required',
        ];

        $messages = [
            'sampul_artikel.required'       => 'Nama Wajib Diisi',
            'sampul_artikel.mimes'          => 'Foto harus berformat gambar (jpeg, png, jpg atau svg)',
            'judul_artikel.required'        => 'Judul Artikel Wajib Diisi',
            'deskripsi.required'            => 'Deskripsi Wajib Diisi'         
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        
        $data = $request->all();
        // proses mengupload foto profil
        $image = $request->file('sampul_artikel');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('uploads/artikel'), $imageName);
        $data['sampul_artikel'] = $imageName;
        Artikel::create($data);

        Alert::success('Berhasil', 'Artikel Berhasil Dibuat');

        return redirect('/artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::find($id);

        return view('pages.admin.artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);

        return view('pages.admin.artikel.edit', compact('artikel'));
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
            'sampul_artikel'        => 'image|mimes:jpeg,png,jpg,svg',
            'judul_artikel'         => 'required',
            'deskripsi'             => 'required',
        ];

        $messages = [
            'sampul_artikel.required'       => 'Nama Wajib Diisi',
            'sampul_artikel.mimes'          => 'Foto harus berformat gambar (jpeg, png, jpg atau svg)',
            'judul_artikel.required'        => 'Judul Artikel Wajib Diisi',
            'deskripsi.required'            => 'Deskripsi Wajib Diisi'         
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $artikel = Artikel::find($id);
        $data = $request->all();

        if($request->sampul_artikel) {
            $image = $request->file('sampul_artikel');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('uploads/artikel'), $imageName);
            $data['sampul_artikel'] = $imageName;
        }

        $artikel->update($data);

        Alert::success('Berhasil', 'Artikel Berhasil Diubah');

        return redirect('/artikel');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();

        Alert::success('Berhasil', 'Artikel Berhasil Dihapus');

        return redirect('/artikel');
    }

    public function homeArtikel()
    {
        $artikel = Artikel::paginate(12);

        return view('pages.homepage.home', compact('artikel'));
    }

    public function bacaArtikel($id)
    {
        $artikel = Artikel::find($id);

        return view('pages.homepage.detail', compact('artikel'));
    }
}
