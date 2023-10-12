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
    <h1 class="head">Dashboard > Data Mahasiswa</h1>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    </head>
    <div class="data-tambah">
        <h2 class="tittle">Data Mahasiswa</h2>
        <a href="/admin/mahasiswa/create"
            class="px-5 py-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
            Data</a>
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
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="width: 155vh">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Mahasiswa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Kelamin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nomer Handphone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $i)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $i->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $i->gender }}
                        </td>
                        <td class="px-6 py-5">
                            {{ $i->age }} Tahun
                        </td>
                        <td class="text-center flex space-x-2 mt-3">
                            <a href="/admin/mahasiswa/detail/{{ $i->id }}"
                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                            <a href="/admin/mahasiswa/edit/{{ $i->id }}"
                                class="px-3 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>
                            <form action="/admin/mahasiswa/delete/{{ $i->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button
                                    class="delete-button px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4 mr-5 pr-4">
        {{ $mahasiswa->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('delete-button')) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin Mau Hapus?',
                    text: 'Anda tidak akan dapat mengembalikan ini!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.target.closest('form').submit();
                    }
                });
            }
        });
    </script>
@endsection
