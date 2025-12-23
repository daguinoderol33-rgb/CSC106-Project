<x-guest-layout>
    <div class="w-screen h-screen bg-gradient-to-br from-indigo-600 via-blue-600 to-lighblue-500 flex items-center justify-center">

        <form method="POST" action="{{ route('register') }}" class="flex flex-col justify-center items-center w-full max-w-lg px-6">
            @csrf

            <h1 class="text-5xl font-extrabold text-white mb-12 text-center">Create Account</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-800 px-6 py-3 rounded mb-6 w-full text-center">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Name -->
            <input 
                type="text" 
                name="name" 
                placeholder="Full Name" 
                class="w-full px-6 py-4 rounded-xl bg-white/30 text-white placeholder-white/70 focus:ring-4 focus:ring-indigo-300 focus:outline-none text-lg mb-6"
                required 
                autofocus
            />

            <!-- Email -->
            <input 
                type="email" 
                name="email" 
                placeholder="Email" 
                class="w-full px-6 py-4 rounded-xl bg-white/30 text-white placeholder-white/70 focus:ring-4 focus:ring-indigo-300 focus:outline-none text-lg mb-6"
                required
            />

            <!-- Password -->
            <input 
                type="password" 
                name="password" 
                placeholder="Password" 
                class="w-full px-6 py-4 rounded-xl bg-white/30 text-white placeholder-white/70 focus:ring-4 focus:ring-indigo-300 focus:outline-none text-lg mb-6"
                required
            />

            <!-- Confirm Password -->
            <input 
                type="password" 
                name="password_confirmation" 
                placeholder="Confirm Password" 
                class="w-full px-6 py-4 rounded-xl bg-white/30 text-white placeholder-white/70 focus:ring-4 focus:ring-indigo-300 focus:outline-none text-lg mb-6"
                required
            />

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full py-4 rounded-xl bg-white/40 text-white text-lg font-semibold hover:bg-white hover:text-indigo-700 transition-all duration-300 mb-6"
            >
                Register
            </button>

            <!-- Login Link -->
            <p class="text-center text-white text-sm">
                Already have an account? 
                <a href="{{ route('login') }}" class="underline hover:text-gray-200">Login</a>
            </p>
        </form>

    </div>
</x-guest-layout>
