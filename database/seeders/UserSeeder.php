<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nama' => 'Administrator',
                // 'tempat_lahir' => 'Badung',
                // 'tanggal_lahir' => '1990-01-01',
                // 'jenis_kelamin' => 1,
                // 'no_hp' => '0812341234',
                // 'alamat' => 'Jl. Sidakarya No. 1',
                'foto' => 'assets/uploads/users/default.png',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'is_admin' => true
            ],
            [
                'nama' => 'user',
                // 'tempat_lahir' => 'Badung',
                // 'tanggal_lahir' => '1990-01-01',
                // 'jenis_kelamin' => 1,
                // 'no_hp' => '0812341234',
                // 'alamat' => 'Jl. Sidakarya',
                'foto' => 'assets/uploads/users/default.png',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
                'is_admin' => false
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
