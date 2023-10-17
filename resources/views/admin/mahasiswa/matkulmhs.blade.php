@extends('admin.components.app')
@section('container')
<label class="block text-xl font-medium text-gray-700 dark:text-gray-400 mb-3 mt-5">Mata Kuliah Saya</label>
<table class="table-auto  border border-gray-300">
    <thead>
        <tr>
            <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Nama Mahasiswa</th>
            <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Mata Kuliah </th>
            <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Waktu Pelaksanaan</th>
            <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Deskripsi Mata Kuliah</th>
            <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Dosen Pengajar</th>
            <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Status</th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-300 dark:bg-gray-700 dark:divide-gray-600">
        @foreach ($matakuliah as $a )
        <tr>
            <td class="px-6 py-4"> {{$a->mahasiswa->name}}</td>
            <td class="px-6 py-4"> {{$a->matkul->nama_mata_kuliah}}</td>
            <td class="px-6 py-4"> {{$a->matkul->hari}},{{$a->matkul->waktu}}</td>
            <td class="px-6 py-4"> {{$a->matkul->desc}}</td>
            <td class="px-6 py-4 "> {{$a->matkul->dosen['nama_dosen']}}</td>
            @if ($a->status == 'pending')
            <td class="px-6 py-4 ">
                <span class="text-yellow-500">Menunggu Persetujuan</span>
            </td>
        @elseif ($a->status == 'success')
            <td class="px-6 py-4 ">
                <span class="text-green-500">Telah disetujui</span>
            </td>
        @else
            <td class="px-6 py-4">
                <span class="text-red-500">Tidak disetujui</span>
            </td>
        @endif
        </tr>
                    
        @endforeach
    </tbody>
</table>
@endsection