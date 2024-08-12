<div>
    <div class="flex space-x-4 mb-4">
        <button wire:click="updateFilter('daily')" class="bg-blue-500 text-white px-4 py-2 rounded">Daily</button>
        <button wire:click="updateFilter('monthly')" class="bg-blue-500 text-white px-4 py-2 rounded">Monthly</button>
        <button wire:click="updateFilter('yearly')" class="bg-blue-500 text-white px-4 py-2 rounded">Yearly</button>
        <button wire:click="updateFilter('custom')" class="bg-blue-500 text-white px-4 py-2 rounded">Custom</button>
    </div>

    @if ($filterType === 'custom')
        <div class="mb-4">
            <label for="startDate" class="block">Start Date:</label>
            <input type="date" id="startDate" wire:model="startDate" class="border px-4 py-2 rounded">

            <label for="endDate" class="block mt-2">End Date:</label>
            <input type="date" id="endDate" wire:model="endDate" class="border px-4 py-2 rounded">
        </div>
    @endif

    <h2 class="text-lg font-semibold mb-4">Total Profit: Rp. {{ number_format($totalProfit, 0, ',', '.') }}</h2>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="border px-4 py-2">Transaction Code</th>
                <th class="border px-4 py-2">Phone Number</th>
                <th class="border px-4 py-2">Amount</th>
                <th class="border px-4 py-2">Total Price</th>
                <th class="border px-4 py-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td class="border px-4 py-2">{{ $transaction->transaction_code }}</td>
                    <td class="border px-4 py-2">{{ $transaction->phone_number }}</td>
                    <td class="border px-4 py-2">{{ number_format($transaction->amount, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ $transaction->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
