<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kepsek;

class KepsekSeeder extends Seeder
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
        $user->name = 'Kepala Sekolah';
        $user->level = 'kepsek';
        $user->email = 'kepsek@gmail.com';
        $user->avatar = 'default.png';
        $user->password = password_hash('kepsek123', PASSWORD_BCRYPT, $options);
        $user->konfirmasi_password = 'kepsek123';
        $user->save();

        $admin = new Kepsek();
        $admin->id_user = $user->id;
        $admin->jk = 'L';
        $admin->nip = '9876543210';
        $admin->alamat = 'Baubau';
        $admin->no_hp = '1234567890';
        $admin->save();
    }
}
