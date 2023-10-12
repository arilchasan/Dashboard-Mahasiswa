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
<h1 class="head">Dashboard > Data Mahasiswa > Detail</h1>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
</head>
<h2 class="tittle">Detail Mahasiswa</h2>
<div class="mb-10">   
    <form class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4 p-4" readonly>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama Mahasiswa</label>
            <input type="text" id="name" name="name" value="{{ $mahasiswa->name }}" class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3" readonly>
        </div>
        <div class="mb-4">
            <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jenis Kelamin</label>
            <input type="text" id="gender" name="gender" value="{{ $mahasiswa->gender }}" class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3" readonly>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nomer Handphone</label>
            <input type="text" id="phone" name="phone" value="{{ $mahasiswa->phone }}" class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3" readonly>
        </div>
        <div class="mb-4">
            <label for="addres" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Alamat</label>
            <input type="text" id="addres" name="addres" value="{{ $mahasiswa->address }}" class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3" readonly>
        </div>
        <div class="mb-4">
            <label for="age" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Umur</label>
            <input type="text" id="age" name="age" value="{{ $mahasiswa->age }} Tahun" class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3" readonly>
        </div>
        <div class="mb-4">
            <label for="age" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jurusan</label>
            <input type="text" id="age" name="age" value="{{ $mahasiswa->jurusan->jurusan }}" class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-3" readonly>
        </div>
        <a href="/admin/mahasiswa/list" class="px-5 py-3 text-xs font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" >Kembali</a>
    </form>   
</div>
@endsection
