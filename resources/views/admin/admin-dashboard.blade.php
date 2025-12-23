<x-layouts.sidebar>
    <div class="min-h-screen w-full bg-gradient-to-br from-indigo-200 via-blue-200 to-lightblue-500 p-6">
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Pending Payments Card -->
        <a href="{{ route('transactions.status', 'pending') }}" class="block bg-yellow-400 text-white rounded shadow p-6 hover:bg-yellow-500">
            <div class="text-2xl font-bold">{{ $totalPending }}</div>
            <div>Total Pending Payments</div>
        </a>

        <!-- Successful Payments Card -->
        <a href="{{ route('transactions.status', 'done') }}" class="block bg-green-500 text-white rounded shadow p-6 hover:bg-green-600">
            <div class="text-2xl font-bold">{{ $totalDone }}</div>
            <div>Total Successful Payments</div>
        </a>

        
    </div>
</x-layouts.sidebar>
