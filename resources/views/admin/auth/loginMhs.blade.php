<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Login</title>
</head>
<body class="min-h-screen flex justify-center items-center">
    <div class="relative mx-auto w-full max-w-md bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl sm:px-10">
        @if (session()->has('success'))
        <div id="alert-3" 
            class="flex items-center p-4 mb-4 ml-5 text-green-700 rounded-lg bg-green-50 dark:bg-gray-700 dark:text-green-400"
            role="alert">
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div id="alert-2" 
            class="flex items-center p-4 mb-4 ml-5 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('error') }}
            </div>
        </div>
    @endif
        <div class="w-full">
            <div class="text-center">
                <h1 class="text-3xl font-semibold text-gray-900">Login Mahasiswa</h1>
                <p class="mt-2 text-gray-500">Login untuk melanjutkan</p>
            </div>
            <div class="mt-5">
                <form action="/admin/login-mahasiswa-load" method="POST">
                    @csrf
                    <div class="relative mt-6">
                        <input type="text" name="name" id="name" placeholder="Username" class="peer pl-2 mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" required/>
                        <label for="name" class="pb-3 pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Username</label>
                    </div>
                    <div class="relative mt-6">
                        <input type="password" name="password" id="password" placeholder="Password" class="peer pl-2 peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" required/>
                        <label for="password" class="pb-3 pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Password</label>
                        <div class="absolute top-0 right-0 mt-2 mr-3">
                            <span id="password-toggle" class="cursor-pointer" onclick="togglePasswordVisibility()">
                                <i id="password-icon" class="far fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="my-6">
                        <button type="submit" class="w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">Log in</button>
                    </div>
                </form>
                <div class="text-center py-2">
                    <a href="/admin/login" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100">
                        Login sebagai Dosen / Admin
                    </a>
                </div>
                <div class="text-center">
                    <a href="/admin/register" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100">
                        Daftar sebagai Mahasiswa
                    </a>
                </div>
            </div>
        </div>
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
</body>
</html>
