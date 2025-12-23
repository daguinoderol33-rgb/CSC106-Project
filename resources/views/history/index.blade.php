<x-layouts.sidebar>

<div class="min-h-screen w-full bg-gradient-to-br from-indigo-200 via-blue-200 to-lightblue-500 p-6">
    <h1 class="text-3xl font-bold mb-6">Login History</h1>

    <table class="w-full bg-white shadow rounded">
        <tr class="border-b">
            <th class="p-3">User</th>
            <th class="p-3">IP</th>
            <th class="p-3">Date</th>
        </tr>

        @foreach($histories as $h)
        <tr class="border-b">
            <td class="p-3">{{ $h->user->name }}</td>
            <td class="p-3">{{ $h->ip_address }}</td>
            <td class="p-3">{{ $h->created_at }}</td>
        </tr>
        @endforeach
    </table>
</x-layouts.sidebar>
