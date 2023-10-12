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

        .data-tambah {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-right: 3.2rem;
        }
    </style>
    <h1 class="head">Dashboard > Mata Kuliah </h1>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    </head>
    <div class="data-tambah">
        <h2 class="tittle">Mata Kuliah</h2>

    </div>
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
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="width: 155vh">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th scope="col-md-4" class="px-6 py-3">
                        Mata Kuliah
                    </th>
                    <th scope="col-md-4" class="px-6 py-3">
                        Dosen Pengajar
                    </th>
                    <th scope="col-md-4" class="px-6 py-3">
                        Kuota
                    </th>
                    <th scope="col-md-4" class="px-6 py-3">
                        Waktu
                    </th>
                    <th scope="col-md-4" class="px-6 py-3">
                        Ruangan
                    </th>
                    <th scope="col-md-4" class="px-6 py-3">
                        Opsi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matkul as $mk)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $mk->nama_mata_kuliah }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $mk->dosen->nama_dosen }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $mk->kuota }} Orang
                        </td>
                        <td class="px-6 py-4">
                            {{ $mk->hari }} pukul {{ $mk->waktu }} - {{ $mk->waktu_selesai }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $mk->ruangan->nama_ruangan }}
                        </td>
                        <td>
                            <a href="/admin/mata-kuliah/detail/{{ $mk->id }}"
                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                        </td>
                    </tr>
                   
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
