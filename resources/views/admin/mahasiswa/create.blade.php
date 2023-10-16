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
            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Password</label>
                <input type="password" id="" name="password" value="{{ old('password') }}" placeholder="Masukkan Password Mahasiswa"
                    class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3">
                <div class="absolute top-0 right-0 mt-2 mr-3">
                    <span id="password-toggle" class="cursor-pointer" onclick="togglePasswordVisibility()">
                        <i id="password-icon" class="far fa-eye"></i>
                    </span>
                </div>
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
            <div class="mb-4">
                <label for="countries"
                    class="pb-3 pointer-events-none   transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Pilih
                    Jurusan</label>
                <select id="countries" name="jurusans_id" id="jurusans_id"
                    class="px-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1">Akutansi</option>
                    <option value="2">Kedokteran</option>
                    <option value="3">Teknik Informatika</option>
                    <option value="4">Ilmu Komputer</option>
                </select>
            </div>
            <a href="/admin/mahasiswa/list"
                class="px-5 py-3 text-xs font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</a>
            <button type="submit"
                class="px-5 py-3 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Simpan</button>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            const passwordIcon = document.getElementById("password-icon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordIcon.className = "far fa-eye-slash"; // Change to the eye-slash icon
            } else {
                passwordField.type = "password";
                passwordIcon.className = "far fa-eye"; // Change back to the eye icon
            }
        }
    </script>
@endsection
