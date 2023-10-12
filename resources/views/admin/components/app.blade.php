<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<title>Dashboard Admin </title>

<link rel="icon" type="image/x-icon" href="/img/zoro.png" />
<head>
    @vite('resources/js/app.js')
</head>
<style>
    .grid-container {
    display: grid;
    grid-template-columns: 1fr 4fr; 
    gap: 16px; 
}
.content-container {
    margin-left: 34vh; 
}

</style>
<body>

    <div class="grid-container">
        @include('admin.components.sidebar')
    </div>
        <div class="content-container">
            @yield('container')
        </div>
    </div>
</body>

</html>
