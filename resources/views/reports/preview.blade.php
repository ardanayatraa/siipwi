<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl">Preview Report</h1>
        <div class="flex space-x-4">
            <a href="{{ route('laporan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            <a href="{{ $pdfPath }}" download class="bg-green-500 text-white px-4 py-2 rounded">Download Report</a>
        </div>
    </div>

    <iframe src="{{ $pdfPath }}" width="100%" height="800px" frameborder="0"></iframe>
</x-app-layout>
