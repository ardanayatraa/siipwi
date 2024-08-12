<x-app-layout>
    <div class="relative min-h-screen bg-purple-50">
        <!-- Konten Utama -->
        <div class="absolute inset-0 bg-white shadow-lg rounded-lg p-8 space-y-6 overflow-y-auto max-h-screen">
            <div class="max-w-4xl mx-auto px-6 py-12">
                <!-- Baris Judul dan Tombol Kembali -->
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-4xl font-extrabold text-purple-700">Panduan Import Stok</h1>
                    <a href="{{ route('stock.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                </div>

                <!-- Konten Artikel -->
                <div class="space-y-6">
                    <h2 class="text-3xl font-semibold text-purple-600">Pendahuluan</h2>
                    <p class="text-lg leading-relaxed">Panduan ini akan membantu Anda mengimpor data stok ke sistem kami
                        dengan cara yang efisien. Pastikan Anda mengikuti langkah-langkah di bawah ini untuk memastikan
                        proses impor berjalan lancar.</p>

                    <!-- Langkah 1 -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h3 class="text-2xl font-semibold text-purple-600">1. Menyiapkan File Excel</h3>
                        <p class="text-lg leading-relaxed">Pastikan file Excel Anda memiliki kolom-kolom berikut:</p>
                        <ul class="list-disc list-inside ml-5 space-y-2">
                            <li><strong>Category:</strong> Kategori produk, seperti 'Pulsa' atau 'Paket Data'.</li>
                            <li><strong>Kode:</strong> Kode unik untuk setiap produk.</li>
                            <li><strong>Keterangan:</strong> Deskripsi atau nama produk.</li>
                            <li><strong>Harga:</strong> Harga produk dalam format numerik.</li>
                            <li><strong>Status:</strong> Status produk, misalnya 'Aktif' atau 'Nonaktif'.</li>
                        </ul>
                        <p class="mt-4">Unduh <a href="#"
                                class="text-purple-600 hover:underline font-semibold">template contoh</a> untuk
                            memeriksa format yang benar.</p>
                        <img src="https://via.placeholder.com/600x400?text=Menyiapkan+File+Excel"
                            alt="Menyiapkan File Excel" class="w-full h-auto rounded-lg mt-4">
                    </div>

                    <!-- Langkah 2 -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h3 class="text-2xl font-semibold text-purple-600">2. Mengakses Fitur Import</h3>
                        <p class="text-lg leading-relaxed">Masuk ke panel admin, buka menu 'Stok', dan klik tombol
                            'Import Data' untuk memulai.</p>
                        <img src="https://via.placeholder.com/600x400?text=Mengakses+Fitur+Import"
                            alt="Mengakses Fitur Import" class="w-full h-auto rounded-lg mt-4">
                    </div>

                    <!-- Langkah 3 -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h3 class="text-2xl font-semibold text-purple-600">3. Mengunggah File Excel</h3>
                        <p class="text-lg leading-relaxed">Klik tombol 'Pilih File', pilih file Excel yang telah Anda
                            siapkan, lalu klik 'Unggah' untuk memulai proses impor.</p>
                        <img src="https://via.placeholder.com/600x400?text=Mengunggah+File+Excel"
                            alt="Mengunggah File Excel" class="w-full h-auto rounded-lg mt-4">
                    </div>

                    <!-- Langkah 4 -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h3 class="text-2xl font-semibold text-purple-600">4. Verifikasi Data</h3>
                        <p class="text-lg leading-relaxed">Sistem akan menampilkan prabaca data dari file Excel.
                            Pastikan semua data sudah benar dan sesuai sebelum melanjutkan.</p>
                        <img src="https://via.placeholder.com/600x400?text=Verifikasi+Data" alt="Verifikasi Data"
                            class="w-full h-auto rounded-lg mt-4">
                    </div>

                    <!-- Langkah 5 -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h3 class="text-2xl font-semibold text-purple-600">5. Menyelesaikan Proses Import</h3>
                        <p class="text-lg leading-relaxed">Jika semua data sudah terverifikasi, klik tombol 'Simpan'
                            untuk menyelesaikan proses impor. Data akan ditambahkan ke sistem dan siap digunakan.</p>
                        <img src="https://via.placeholder.com/600x400?text=Menyelesaikan+Proses+Import"
                            alt="Menyelesaikan Proses Import" class="w-full h-auto rounded-lg mt-4">
                    </div>

                    <h2 class="text-3xl font-semibold text-purple-600">Tips Penting</h2>
                    <ul class="list-disc list-inside ml-5 space-y-2">
                        <li>Pastikan format file Excel sesuai dengan template yang disediakan untuk menghindari
                            kesalahan.</li>
                        <li>Periksa kembali data untuk memastikan tidak ada kesalahan sebelum menyimpan.</li>
                        <li>Hubungi tim dukungan jika Anda mengalami kesulitan atau memiliki pertanyaan.</li>
                    </ul>

                    <div class="bg-gray-100 p-6 rounded-lg">
                        <h2 class="text-2xl font-semibold text-purple-600">Kontak Dukungan</h2>
                        <p class="text-lg leading-relaxed">Jika Anda memerlukan bantuan lebih lanjut, silakan hubungi
                            kami melalui:</p>
                        <p class="text-lg"><a href="mailto:support@domain.com"
                                class="text-purple-600 hover:underline">support@domain.com</a></p>
                        <p class="text-lg">Telepon: <strong>(123) 456-7890</strong></p>
                    </div>

                    <!-- Referensi Aplikasi -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h2 class="text-2xl font-semibold text-purple-600">Referensi Product</h2>
                        <p class="text-lg leading-relaxed">Untuk referensi stock dan harga aplikasi ini menggunakan : <a
                                href="https://www.draggeel.com/pricelis/"
                                class="text-purple-600 hover:underline">Draggeel</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
