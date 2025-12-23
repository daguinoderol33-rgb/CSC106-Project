<x-layouts.sidebar>
    <div class="min-h-screen w-full bg-gradient-to-br from-indigo-200 via-blue-200 to-lightblue-500 p-6"
         x-data="{ search: '' }">

        <h1 class="text-3xl font-bold mb-6">Transactions</h1>

<div class="flex items-center justify-between mb-4">
    <input type="text"
           placeholder="Search..."
           x-model.debounce.300ms="search"
           class="border rounded px-3 py-1 w-64" />

    {{-- Show Add Borrower only if NOT admin --}}
    @if(auth()->user()->role !== 'admin')
        <a href="/transactions/create"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold
                  hover:bg-indigo-700 transition flex items-center gap-2">
            ➕ Add Borrower
        </a>
    @endif
</div>

        <table class="w-full bg-white shadow rounded text-gray-800">
            <thead>
                <tr class="border-b bg-gray-100">
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Address</th>
                    <th class="p-3 text-left">Contact Number</th>
                    <th class="p-3 text-left">Work</th>
                    <th class="p-3 text-left">Amount</th>
                    <th class="p-3 text-left">Created By</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $t)
                <template x-if="
                    '{{ strtolower($t->borrower_name) }}'.includes(search.toLowerCase()) ||
                    '{{ strtolower($t->address) }}'.includes(search.toLowerCase()) ||
                    '{{ strtolower($t->contact_number) }}'.includes(search.toLowerCase()) ||
                    '{{ strtolower($t->work) }}'.includes(search.toLowerCase()) ||
                    '{{ $t->amount }}'.includes(search) ||
                    '{{ strtolower($t->status) }}'.includes(search.toLowerCase())
                ">
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $t->borrower_name }}</td>
                    <td class="p-3">{{ $t->address }}</td>
                    <td class="p-3">{{ $t->contact_number }}</td>
                    <td class="p-3">{{ $t->work }}</td>
                    <td class="p-3">{{ number_format($t->amount, 2) }}</td>
                    <td class="p-3">{{ $t->user->name }}</td>
                    <td class="p-3">{{ $t->created_at->format('d M Y H:i') }}</td>
                    <td class="p-3">
                        @if($t->status === 'pending')
                            <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full font-bold text-sm">Pending</span>
                            <form action="{{ route('transactions.updateStatus', $t->id) }}" method="POST" class="inline ml-2">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 text-sm">
                                    Mark Paid
                                </button>
                            </form>
                        @else
                            <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full font-bold text-sm">Done</span>
                        @endif
                    </td>
                </tr>
                </template>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.sidebar>
