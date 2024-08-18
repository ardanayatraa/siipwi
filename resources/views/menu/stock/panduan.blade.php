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
                            <li><strong>Status:</strong> Status produk, misalnya 'OPEN' atau 'CLOSE'.</li>
                        </ul>
                        <p class="mt-4">Unduh <a
                                href="https://docs.google.com/spreadsheets/d/1uMbi499xReJK5rD6vVRejI2XeMSVJ30uopbQ1R46de0/edit?usp=sharing"
                                class="text-purple-600 hover:underline font-semibold">template contoh</a> untuk
                            memeriksa format yang benar.</p>
                        <img src="/assets/img/panduan/p1.JPG" alt="Menyiapkan File Excel"
                            class="w-full h-auto rounded-lg mt-4"><br>
                        <p class="text-lg leading-relaxed">jika nama produknya misalnya "GAMEMAX SILVER" itu di
                            tambahkan
                            imbuhan nama providernya ketika di category , hasil akhirnya menjadi <strong>GAMEMAX
                                SILVER TELKOMSEL</strong>, kemudian download atau simpan file template.</p>
                    </div>

                    <!-- Langkah 2 -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h3 class="text-2xl font-semibold text-purple-600">2. Mengakses Fitur Import</h3>
                        <p class="text-lg leading-relaxed">Masuk ke panel admin, buka menu 'Stok', dan klik tombol
                            'Import Stock' untuk memulai.</p>
                        <img src="/assets/img/panduan/p2.JPG" alt="Menyiapkan File Excel"
                            class="w-full h-auto rounded-lg mt-4"><br>
                    </div>

                    <!-- Langkah 3 -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h3 class="text-2xl font-semibold text-purple-600">3. Mengunggah File Excel</h3>
                        <p class="text-lg leading-relaxed">Klik tombol 'Pilih File', pilih file Excel yang telah Anda
                            siapkan, lalu klik <strong>IMPORT</strong> untuk memulai proses impor.</p>
                        <img src="/assets/img/panduan/p3.JPG" alt="Menyiapkan File Excel"
                            class="w-full h-auto rounded-lg mt-4"><br>
                    </div>

                    <!-- Langkah 4 -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h3 class="text-2xl font-semibold text-purple-600">4. Verifikasi Data</h3>
                        <p class="text-lg leading-relaxed">Sistem akan menampilkan prabaca data dari file Excel.
                            Pastikan semua data sudah benar dan sesuai sebelum melanjutkan.</p>
                        <img src="/assets/img/panduan/p4.JPG" alt="Menyiapkan File Excel"
                            class="w-full h-auto rounded-lg mt-4"><br>
                    </div>



                    <!-- Referensi Aplikasi -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h2 class="text-2xl font-semibold text-purple-600">Referensi Product</h2>
                        <p class="text-lg leading-relaxed">Untuk referensi stock dan harga aplikasi ini menggunakan
                            Pricelist : <a href="https://www.draggeel.com/pricelis/"
                                class="text-purple-600 hover:underline">Draggeel</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
