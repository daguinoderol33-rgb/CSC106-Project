<x-layouts.sidebar>
    <div class="min-h-screen w-full bg-gradient-to-br from-indigo-200 via-blue-200 to-lightblue-500 p-6">
    <h1 class="text-3xl font-bold mb-6">Add Borrower</h1>

    <form action="{{ route('transactions.store') }}" method="POST" class="bg-white p-6 rounded shadow text-gray-800">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-bold">Name</label>
            <input type="text" name="borrower_name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-bold">Address</label>
            <input type="text" name="address" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-bold">Contact Number</label>
            <input type="text" name="contact_number" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-bold">Work</label>
            <input type="text" name="work" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-bold">Amount</label>
            <input type="number" name="amount" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-bold rounded hover:bg-indigo-700">
            Save
        </button>
    </form>
</x-layouts.sidebar>
