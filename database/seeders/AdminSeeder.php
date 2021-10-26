<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            'cost' => 11 // parameter untuk algoritma enkripsi BLOWFISH
        ];

        $user = new User();
        $user->name = 'Administrator';
        $user->level = 'admin';
        $user->email = 'admin@gmail.com';
        $user->avatar = 'default.png';
        $user->password = password_hash('admin123', PASSWORD_BCRYPT, $options);
        $user->konfirmasi_password = 'admin123';
        $user->save();

        $admin = new Admin();
        $admin->id_user = $user->id;
        $admin->jk = 'L';
        $admin->nip = '1234567890';
        $admin->alamat = 'Baubau';
        $admin->no_hp = '1234567890';
        $admin->save();
        
    }
}
