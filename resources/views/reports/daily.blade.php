<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Harian</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 8px;
            }

            th {
                background-color: #f4f4f4;
                text-align: left;
            }
        </style>
    </head>

    <body>
        <h1>Laporan Harian - {{ $date }}</h1>
        <p>Total Keuntungan: Rp. {{ number_format($totalProfit, 0, ',', '.') }}</p>
        <table>
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Nomor Telepon</th>
                    <th>Jumlah</th>
                    <th>Provider</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_code }}</td>
                        <td>{{ $transaction->phone_number }}</td>
                        <td>Rp. {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                        <td>{{ $transaction->provider->name }}</td>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{ $transaction->category_id }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>Rp. {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
