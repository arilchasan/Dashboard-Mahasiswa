<?php

namespace Database\Seeders;

use App\Models\Ruangan as ModelsRuangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Ruangan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruangan =
            [
                [
                    'nama_ruangan' => 'Ruang Matematika',
                    'kode_ruangan' => 1,
                ],
                [
                    'nama_ruangan' => 'Lab. Komputer',
                    'kode_ruangan' => 2,
                ],
                [
                    'nama_ruangan' => 'Lab. Bahasa',
                    'kode_ruangan' => 3,
                ],
                [
                    'nama_ruangan' => 'Lab. Jaringan',
                    'kode_ruangan' => 4,
                ],
            ];

            foreach ($ruangan as $dataRuangan) {
                ModelsRuangan::create($dataRuangan);
            }
    }
}
