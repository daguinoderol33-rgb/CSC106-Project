<aside class="w-64 bg-indigo-300 shadow-lg hidden md:block">
    <div class="p-6 border-b flex justify-center items-center">
        <h1 class="text-4xl font-bold text-gray-800">p.m.c</h1>
    </div>

    <nav class="mt-6 space-y-1">
        <a href="/dashboard" class="block px-6 py-3 font-bold hover:bg-indigo-100 flex items-center">📊 Dashboard</a>
        <a href="/transactions" class="block px-6 py-3 font-bold hover:bg-indigo-100 flex items-center">💰 Payment History</a>
        <a href="/account" class="block px-6 py-3 font-bold hover:bg-indigo-100 flex items-center">👤 My Account</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block px-6 py-3 font-bold hover:bg-indigo-100 flex items-center">
                🔒 Logout
            </button>
        </form>
    </nav>
</aside>
