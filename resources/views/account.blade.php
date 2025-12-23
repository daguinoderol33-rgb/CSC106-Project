<x-layouts.sidebar>
    <div class="min-h-screen bg-gradient-to-br from-indigo-200 via-blue-200 to-lightblue-500 p-6">

        <h1 class="text-3xl font-bold mb-6">My Account</h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        {{-- Account Info --}}
        <form method="POST" action="{{ route('account.update') }}" class="mb-8">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label class="block font-bold mb-1">Name</label>
                <input type="text" name="name"
                       value="{{ auth()->user()->name }}"
                       class="w-full max-w-md border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Email</label>
                <input type="email" name="email"
                       value="{{ auth()->user()->email }}"
                       class="w-full max-w-md border rounded px-3 py-2">
            </div>

            <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                Update Account
            </button>
        </form>

        <hr class="mb-6">

        {{-- Change Password --}}
        <h2 class="text-xl font-bold mb-4">Change Password</h2>

        <form method="POST" action="{{ route('account.password') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold mb-1">Old Password</label>
                <input type="password" name="current_password"
                       class="w-full max-w-md border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">New Password</label>
                <input type="password" name="password"
                       class="w-full max-w-md border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Confirm New Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full max-w-md border rounded px-3 py-2">
            </div>

            @error('current_password')
                <div class="text-red-600 mb-2">{{ $message }}</div>
            @enderror

            @error('password')
                <div class="text-red-600 mb-2">{{ $message }}</div>
            @enderror

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Update Password
            </button>
        </form>

    </div>
</x-layouts.sidebar>
