<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .auth-link:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-400 to-white flex justify-center items-center h-screen">
    <div class="bg-white rounded-lg p-8 shadow-lg text-center">
        <div class="text-2xl font-bold mb-4">Faculty Management System</div>
        <div class="mb-6">
            <img src="{{ asset('assets/admin/img/Faculty1.png') }}" alt="Icon" class="w-24 h-24 mx-auto">
            {{-- <img src="{{ asset('assets/admin/img/Faculty2.png') }}" alt="Icon" class="w-24 h-24 mx-auto"> --}}
        </div>

        <div class="mt-4">
            @if (Route::has('login'))
                <div class="auth-links">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="auth-link">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="auth-link bg-blue-400 hover:bg-blue-500 text-white py-2 px-6 rounded-md font-semibold shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">Log in</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>
</html>
