<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pertemuan 1 - PWF</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f0f0f] flex items-center justify-center min-h-screen font-sans">
    @if (Route::has('login'))
        <div class="fixed top-0 right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-400 hover:text-white">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-400 hover:text-white">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-400 hover:text-white">Register</a>
                @endif
            @endauth
        </div>
    @endif
    
    <div class="bg-[#1a1a1a] border border-[#333] rounded-lg p-8 w-full max-w-3xl shadow-lg">
        
        <h1 class="text-white text-lg font-semibold tracking-wide">Nabil Nasruddin Al Mutawakkil</h1>
        <p class="text-gray-400 text-sm mt-1 mb-6">NIM: 20230140002</p>
        
        <button class="bg-[#f3f4f6] hover:bg-white text-black font-medium py-2 px-4 rounded transition duration-200">
            Modul Pertemuan 1
        </button>

    </div>

</body>
</html>