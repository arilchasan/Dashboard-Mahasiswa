<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataUser = 
        [
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Dosen',
                'password' => Hash::make('dosen123'),
                'role' => 'dosen'
            ],
            [
                'name' => 'Mahasiswa',
                'password' => Hash::make('mahasiswa123'),
                'role' => 'mahasiswa'
            ],
        ];

        foreach ($dataUser as $data) {
          ModelsUser::create($data);
        }
    }
}
