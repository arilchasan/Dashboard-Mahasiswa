@extends('admin.components.app')
@section('container')
    <style scoped>
        .head {
            margin-top: 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: 100;
            font-size: 14px;
            margin-bottom: 20px;
        }
    </style>
    <h1 class="head">Dashboard </h1>

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
@endsection
