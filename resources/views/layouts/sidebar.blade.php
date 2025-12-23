<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- LEFT SIDEBAR -->
        
            <aside class="w-64 bg-indigo-300 shadow-lg hidden md:block">
    <div class="p-6 border-b flex justify-center items-center">
        <h1 class="text-4xl font-bold text-gray-800">p.m.c</h1>
    </div>

    <nav class="mt-6 space-y-1">
        <a href="/dashboard" class="block px-6 py-3 font-bold hover:bg-indigo-100 flex items-center">
            📊 Dashboard
        </a>
        <a href="/transactions" class="block px-6 py-3 font-bold hover:bg-indigo-100 flex items-center">
            💰 Transactions
        </a>


        <a href="/account" class="block px-6 py-3 font-bold hover:bg-indigo-100 flex items-center">👤 My Account</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block px-6 py-3 font-bold hover:bg-indigo-100 flex items-center">
                🔒 Logout
            </button>
        </form>
    </nav>
</aside>


        <!-- MAIN CONTENT -->
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
