@extends('admin.components.app')
@section('container')
    <style scoped>
        .head {
            margin-top: 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: 100;
            font-size: 14px;
        }

        .tittle {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <h1 class="head">Dashboard > Mata Kuliah > Detail</h1>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    </head>
    <h2 class="tittle">Detail Mata Kuliah</h2>
    @if (session()->has('success'))
        <div id="alert-3" style="width: 150vh"
            class="flex items-center p-4 mb-4 ml-5 text-green-700 rounded-lg bg-green-50 dark:bg-gray-700 dark:text-green-400"
            role="alert">
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session()->has('errors'))
        <div id="alert-2" style="width: 150vh"
            class="flex items-center p-4 mb-4 ml-5 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('errors') }}
            </div>
        </div>
    @endif
    <div class="mb-10" style="width:95%">
        <form class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4 p-4"  action="/admin/gabung-matkul"
            method="POST" id="input-data" enctype="multipart/form-data">
            @csrf
            <input type="text" id="mahasiswa_id" name="mahasiswa_id" value="{{ $idM }}" hidden
                class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3"
                readonly>
            <input type="text" id="matkul_id" name="matkul_id" value="{{ $matkul_id->kode_mata_kuliah }}" hidden
                class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3"
                readonly>
                
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama Mata
                    Kuliah</label>
                <input type="text" id="name" name="name" value="{{ $matkul->nama_mata_kuliah }}"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3"
                    readonly>

            </div>
            <div class="mb-4">
                <label for="dosen" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Dosen
                    Pengajar</label>
                <input type="text" id="dosen" name="dosen" value="{{ $matkul->dosen->nama_dosen }}"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3"
                    readonly>
            </div>
            <div class="mb-4">
                <label for="matkul_id" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" value="{{ $matkul->jurusan }}"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3"
                    readonly>
            </div>
            <div class="mb-4">
                <label for="kuota" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Kuota</label>
                <input type="text" id="kuota" name="kuota" value="{{ $matkul->kuota }} Orang"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3"
                    readonly>
            </div>
            <div class="mb-4">
                <label for="waktu" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Waktu</label>
                <input type="text" id="waktu" name="waktu"
                    value=" {{ $matkul->hari }} pukul {{ $matkul->waktu }} - {{ $matkul->waktu_selesai }}"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3"
                    readonly>
            </div>
            <div class="mb-4">
                <label for="ruangan" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Ruangan</label>
                <input type="text" id="ruangan" name="ruangan" value="{{ $matkul->ruangan->nama_ruangan }}"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3"
                    readonly>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-3">Daftar
                    Mahasiswa</label>
                <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Nama Mahasiswa</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Jenis Kelamin</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Nomor Handphone</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Bidang Jurusan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300 dark:bg-gray-700 dark:divide-gray-600">
                        @if ($mahasiswa->isEmpty())
                            <tr class="text-center">
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                    colspan="11">Belum ada Mahasiswa yang mengambil mata kuliah ini</td>
                            </tr>
                        @endif
                        @foreach ($mahasiswa as $key)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ $key->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ $key->gender}}</td>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ $key->phone}}</td>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ $key->jurusan['jurusan']}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


            <a href="/admin/mata-kuliah"
                class="px-5 py-3 text-xs font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</a>
            @if (auth('mahasiswa')->user()->role == 'mahasiswa')
                <button type="submit"
                    class="px-5 py-3 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Gabung
                    Mata Kuliah
                </button>
            @endif
        </form>
    </div>
@endsection
