<x-app-layout>
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Generate Report</h1>

    <form action="{{ route('laporan.generate', ['type' => 'daily']) }}" method="GET"
        class="bg-white shadow-md rounded-lg p-6 space-y-6" id="reportForm">
        <div class="flex items-center mb-4">
            <label for="reportType" class="block text-lg font-medium text-gray-700 mr-4">Report Type:</label>
            <select id="reportType" name="type"
                class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                onchange="updateFormAction(this)">
                <option value="daily">Daily</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
                <option value="custom">Custom</option>
            </select>
        </div>

        <div id="filters" class="space-y-6">
            <div id="daily-filter" class="filter-section">
                <label for="date" class="block text-gray-600 mb-1">Date:</label>
                <input type="date" id="date" name="date"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
            </div>

            <div id="monthly-filter" class="filter-section hidden">
                <label for="month" class="block text-gray-600 mb-1">Month:</label>
                <input type="month" id="month" name="month"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                <label for="year" class="block text-gray-600 mt-4 mb-1">Year:</label>
                <input type="number" id="year" name="year"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    min="2000" max="{{ date('Y') }}">
            </div>

            <div id="yearly-filter" class="filter-section hidden">
                <label for="year" class="block text-gray-600 mb-1">Year:</label>
                <input type="number" id="year" name="year"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    min="2000" max="{{ date('Y') }}">
            </div>

            <div id="custom-filter" class="filter-section hidden">
                <label for="start_date" class="block text-gray-600 mb-1">Start Date:</label>
                <input type="date" id="start_date" name="start_date"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                <label for="end_date" class="block text-gray-600 mt-4 mb-1">End Date:</label>
                <input type="date" id="end_date" name="end_date"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
            </div>
        </div>

        <button type="submit"
            class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold shadow-sm hover:bg-blue-600 transition duration-200 ease-in-out">Generate
            Report</button>
    </form>

    <script>
        function updateFormAction(select) {
            const type = select.value;
            const form = document.getElementById('reportForm');
            form.action = `{{ url('/laporan/generate') }}/${type}`;
            toggleFilters(select);
        }

        function toggleFilters(select) {
            const type = select.value;
            document.querySelectorAll('#filters > .filter-section').forEach(div => div.classList.add('hidden'));
            document.getElementById(`${type}-filter`).classList.remove('hidden');
        }

        // Initialize the form with the default type
        document.addEventListener('DOMContentLoaded', () => {
            const reportTypeSelect = document.getElementById('reportType');
            updateFormAction(reportTypeSelect); // Set initial state based on default value
        });
    </script>
</x-app-layout>
