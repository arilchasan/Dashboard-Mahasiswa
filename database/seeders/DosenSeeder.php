<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataDosen = [
            [
                'kode_dosen' => 1,
                'nama_dosen' => 'Dr. John Doe',
                'email' => 'john.doe@example.com',
                'matakuliah_id' => 1,
            ],
            [
                'kode_dosen' => 2, 
                'nama_dosen' => 'Prof. Jane Smith',
                'email' => 'jane.smith@example.com',
                'matakuliah_id' => 2,
            ],
            [
                'kode_dosen' => 3, 
                'nama_dosen' => 'Prof. David Wilson',
                'email' => 'david.wilson@example.com',
                'matakuliah_id' => 3,
            ],
            [
                'kode_dosen' => 4, 
                'nama_dosen' => 'Dr. Lisa Anderson',
                'email' => 'lisa.anderson@example.com',
                'matakuliah_id' => 4,
            ],
        ];

        foreach ($dataDosen as $dosen) {
            Dosen::create($dosen);
        }
    }
}
