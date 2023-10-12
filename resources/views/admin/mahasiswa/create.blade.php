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
    <h1 class="head">Dashboard > Data Mahasiswa > Edit</h1>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    </head>
    <h2 class="tittle">Tambah Data Mahasiswa</h2>
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
    <div class="mb-10">
        <form class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4 p-4" action="/admin/mahasiswa/add" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama
                    Mahasiswa</label>
                <input type="text" id="" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Mahasiswa"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jenis
                    Kelamin</label>
                <input type="text" id="" name="gender" value="{{ old('gender') }}" placeholder="Masukkan Jenis Kelamin"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nomer
                    Handphone</label>
                <input type="text" id="" name="phone" value="{{ old('phone') }}" placeholder="Masukkan Nomer Handphone"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Alamat</label>
                <input type="text" id="" name="address" value="{{ old('address') }}" placeholder="Masukkan Alamat"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="age" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Umur</label>
                <input type="text" id="" name="age" value="{{ old('age') }}" placeholder="Masukkan Umur"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3">
            </div>
            <a href="/admin/mahasiswa/list"
                class="px-5 py-3 text-xs font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</a>
            <button type="submit"
                class="px-5 py-3 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Simpan</button>
        </form>
    </div>
@endsection
