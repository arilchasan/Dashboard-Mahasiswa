<?php

namespace Database\Seeders;

use App\Models\MataKuliah as MatKul;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MataKuliah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataMataKuliah = [
            [
                'kode_mata_kuliah' => 1,
                'nama_mata_kuliah' => 'Matematika Dasar',
                'desc' => 'Mata kuliah dasar dalam bidang matematika.',
                'dosen_id' => 1,
                'kuota' => 30,
                'waktu' => '10:00',
                'waktu_selesai' => '11:30',
                'hari' => 'Senin',
                'kode_jurusan' => 1,
                'jurusan' => 'Akutansi',
                'ruangan_id' => 1
            ],
            [
                'kode_mata_kuliah' => 2,
                'nama_mata_kuliah' => 'Bahasa Inggris',
                'desc' => 'Mata kuliah bahasa Inggris untuk pemula.',
                'dosen_id' => 2,
                'kuota' => 20,
                'waktu' => '12:00',
                'waktu_selesai' => '14:00',
                'hari' => 'Rabu',
                'kode_jurusan' => 2,
                'jurusan' => 'Kedokteran',
                'ruangan_id' => 2
            ],
            [
                'kode_mata_kuliah' => 3,
                'nama_mata_kuliah' => 'Pemrograman Web',
                'desc' => 'Mata kuliah tentang pengembangan web.',
                'dosen_id' => 3,
                'kuota' => 20,
                'waktu' => '13:30',
                'waktu_selesai' => '15:30',
                'hari' => 'Sabtu',
                'kode_jurusan' => 3,
                'jurusan' => 'Teknik Informatika',
                'ruangan_id' => 3
            ],
            [
                'kode_mata_kuliah' => 4,
                'nama_mata_kuliah' => 'Basis Data',
                'desc' => 'Mata kuliah tentang manajemen basis data.',
                'dosen_id' => 4,
                'kuota' => 15,
                'waktu' => '15:00',
                'waktu_selesai' => '17:00',
                'hari' => 'Jumat',
                'kode_jurusan' => 4,
                'jurusan' => 'Ilmu Komputer',
                'ruangan_id' => 4
            ],
        ];

        foreach ($dataMataKuliah as $matakuliah) {
            MatKul::create($matakuliah);
        }
    }
}
