<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect('/dashboard');
        }
        return view('auth.login');
    }
 
    public function login(Request $request)
    {
        $rules = [
            'email'                            => 'required|email',
            'konfirmasi_password'              => 'required|string'
        ];
 
        $messages = [
            'email.required'                   => 'Email wajib diisi',
            'email.email'                      => 'Email tidak valid',
            'konfirmasi_password.required'     => 'Password wajib diisi',
            'konfirmasi_password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'email'     => $request->input('email'),
            'konfirmasi_password'  => $request->input('konfirmasi_password'),
        ];
        
        $user = User::where([
            'email' => $request->input('email'), 
            'konfirmasi_password' => $request->input('konfirmasi_password')
        ])->first();

        if ($user) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            Alert::success('Halo!', 'Senang Berjumpa Lagi');
            Auth::login($user);
            return redirect('/dashboard');
 
        } else { // false
 
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
 
    }

    public function logout()
    {
        Auth()->logout(); // menghapus session yang aktif
        Alert::success('Daaahhh!', 'Sampai Jumpa Lagi');
        return redirect('/');
    }
}