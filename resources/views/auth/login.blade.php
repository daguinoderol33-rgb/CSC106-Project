<x-guest-layout>
    <div class="min-h-screen w-full bg-gradient-to-br from-indigo-600 via-blue-600 to-lightblue-500 flex flex-col items-center justify-center px-6">
        
    
    <h1 class="text-8xl font-extrabold text-white mb-12">p.m.c</h1>
        <h1 class="text-4xl font-extrabold text-white mb-12">Philmen's Credit Corporation</h1>
        <h4 class="text-2xl font-extrabold text-white mb-12">Authorized Personnel Only</h4>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 px-6 py-3 rounded mb-6 w-full max-w-md text-center">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="w-full max-w-md flex flex-col space-y-6">
            <!-- Role Selection -->
<div class="mt-4">
    <label for="role" class="block text-sm font-medium text-white">
        Login As
    </label>

    <select id="role" name="role"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm  focus:border-indigo-500 focus:ring-indigo-500"
        required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
</div>

            @csrf

            <!-- Email -->
            <input 
                type="email" 
                name="email" 
                placeholder="Email" 
                class="w-full px-5 py-4 rounded-lg bg-white/30 text-white placeholder-white/70 focus:ring-4 focus:ring-indigo-300 focus:outline-none text-lg"
                required 
                autofocus
            />

            <!-- Password -->
            <input 
                type="password" 
                name="password" 
                placeholder="Password" 
                class="w-full px-5 py-4 rounded-lg bg-white/30 text-white placeholder-white/70 focus:ring-4 focus:ring-indigo-300 focus:outline-none text-lg"
                required
            />

            <!-- Remember Me + Forgot Password -->
            <div class="flex justify-between items-center text-white text-sm">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="rounded text-indigo-600">
                    <span>Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline hover:text-gray-200" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>

            
            <!-- Submit -->
            <button 
                type="submit" 
                class="w-full py-4 rounded-lg bg-white/40 text-white text-lg font-semibold hover:bg-white hover:text-indigo-700 transition-all duration-300"
            >
                Login
            </button>

            <p class="text-center text-white mt-4">
                Don't have an account? 
                <a href="{{ route('register') }}" class="underline hover:text-gray-200">Register</a>
            </p>
        </form>
    </div>
</x-guest-layout>
