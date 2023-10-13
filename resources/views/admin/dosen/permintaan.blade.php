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
    <h1 class="head">Dashboard > Daftar Dosen > Permintaan</h1>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    </head>
    <div class="data-tambah">
        <h2 class="tittle">Daftar Permintaan</h2>

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
    @if (session()->has('error'))
        <div id="alert-2" style="width: 150vh"
            class="flex items-center p-4 mb-4 ml-5 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('error') }}
            </div>
        </div>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="width: 155vh">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col-md-4" class="px-6 py-3">
                        Nama Mahasiswa
                    </th>
                    <th scope="col-md-4" class="px-6 py-3">
                        Mata kuliah yang diambil
                    </th>
                    <th scope="col-md-4" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col-md-4" class="px-6 py-3">
                        Opsi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $d)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $d->mahasiswa->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $d->matkul->nama_mata_kuliah }}
                        </td>
                        <td class="px-6 py-5 status">
                            @if ($d->status == 'pending')
                                <span class="text-yellow-500">{{ $d->status }}</span>
                            @elseif($d->status == 'success')
                                <span class="text-green-500">{{ $d->status }}</span>
                            @else
                                <span class="text-red-500">{{ $d->status }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-5">
                            @if ($d->status == 'success')
                                <span>Telah disetujui</span>
                            @elseif($d->status == 'failed')
                                <span>Telah ditolak</span>
                            @else
                                <form action="/admin/approve-matkul/{{ $d->id }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-1 text-sm text-white bg-green-500 rounded-md hover:bg-green-600"
                                        onclick="acceptOrder({{ $d->id }})">Terima</button>
                                </form>
                                <form action="/admin/reject-matkul/{{ $d->id }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit"
                                        class="delete-button px-3 py-1 text-sm text-white bg-red-500 rounded-md hover:bg-red-600"
                                        onclick="rejectOrder({{ $d->id }})">Tolak</button>
                                </form>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('delete-button')) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin Menolak Permintaan ini?',
                    text: 'Anda tidak akan dapat mengembalikan ini!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Tolak',
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
