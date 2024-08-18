<!-- resources/views/reports/report.blade.php -->
<!DOCTYPE html>
<html>

    <head>
        <style>
            /* Tambahkan gaya CSS di sini jika diperlukan */
            body {
                font-family: Arial, sans-serif;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
            }

            .header {
                text-align: center;
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>
        <div class="header">
            <h1>Laporan {{ ucfirst($type) }}</h1>
            @if ($type === 'daily')
                <p>Tanggal: {{ $date }}</p>
            @elseif($type === 'monthly')
                <p>Bulan: {{ $month }}, Tahun: {{ $year }}</p>
            @elseif($type === 'yearly')
                <p>Tahun: {{ $year }}</p>
            @elseif($type === 'custom')
                <p>Periode: {{ $startDate }} hingga {{ $endDate }}</p>
            @endif
        </div>

        <table>
            <thead>
                <tr>

                    <th>Produk</th>
                    <th>Pelanggan</th>
                    <th>Harga</th>


                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>

                        <td>{{ $transaction->product->name ?? 'N/A' }}</td>
                        <td>{{ $transaction->phone_number ?? 'N/A' }}</td>
                        <td>{{ number_format($transaction->total_price, 0, ',', '.') }}</td>

                        <td>{{ $transaction->created_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p>Total Profit: {{ number_format($totalProfit, 0, ',', '.') }}</p>
    </body>

</html>
