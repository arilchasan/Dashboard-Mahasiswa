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
    <h1 class="head">Dashboard > Daftar Dosen</h1>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    </head>
    <div class="data-tambah">
        <h2 class="tittle">Daftar Dosen</h2>
        
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
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col-md-4" class="px-6 py-3">
                        Nama Dosen
                    </th>
                    <th scope="col-md-4" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col-md-4" class="px-6 py-3">
                        Mata Kuliah yang diajar
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($dosen as $d )
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$d->nama_dosen}}
                        </th>
                        <td class="px-6 py-4">
                            {{$d->email}}
                        </td>
                        <td class="px-6 py-5">
                            {{$d->matakuliah->nama_mata_kuliah}}
                        </td>
                    </tr>         
              @endforeach
            </tbody>
        </table>
    </div>

@endsection
