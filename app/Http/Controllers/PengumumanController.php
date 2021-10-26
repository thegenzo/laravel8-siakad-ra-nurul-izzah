<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::where('id', 1)->first();

        return view('pages.admin.pengumuman.index', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'isi_pengumuman'            => 'required',
        ];

        $messages = [
            'isi_pengumuman.required'   => 'Isi Pengumuman Wajib Diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $pengumuman = Pengumuman::find($id);
        $data = $request->all();
        $pengumuman->update($data);

        return redirect()->back()->with('success', 'Pengumuman Berhasil Disunting');
    }
}
