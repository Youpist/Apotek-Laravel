<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Struk Pembelian</title>

    <style>
        @page {
            size: 80mm auto;
            margin: 5mm;
        }

        @media print {

            body {
                margin: 0;
                background: white;
            }

            .struk {
                width: 72mm;
                margin: auto;
                box-shadow: none;
                border: none;
                padding: 0;
            }

        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #ececec;
            margin: 0;
            padding: 30px;
        }

        .struk {

            width: 440px;
            margin: auto;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, .15);

        }

        h1 {

            margin: 0;
            text-align: center;
            font-size: 30px;

        }

        h4 {

            text-align: center;
            font-weight: normal;
            margin-top: 5px;
            margin-bottom: 20px;

        }

        hr {

            margin: 20px 0;

        }

        table {

            width: 100%;
            border-collapse: collapse;

        }

        table th {

            background: #198754;
            color: white;
            padding: 10px;

        }

        table td {

            padding: 10px;
            border-bottom: 1px solid #ddd;

        }

        .text-right {

            text-align: right;

        }

        .total {

            margin-top: 20px;
            font-size: 22px;
            font-weight: bold;
            text-align: right;

        }

        .footer {

            margin-top: 40px;
            text-align: center;
            color: #666;

        }

        @media print {

            body {

                background: white;

            }

            .btn {

                display: none;

            }

            .struk {

                box-shadow: none;

            }

        }
    </style>

</head>

<body>

    <div class="struk">

        <h1>APOTEK SEHAT</h1>

        <h4>
            Jl. Raya Margonda No.777 <br>
            Telp. (021) 12345678
        </h4>

        <hr>

        <table border="0">

            <tr>
                <td width="170"><b>No Transaksi</b></td>
                <td>: TRX{{ str_pad($transaksi->id, 5, '0', STR_PAD_LEFT) }}</td>
            </tr>

            <tr>
                <td><b>Tanggal</b></td>
                <td>: {{ \Carbon\Carbon::parse($transaksi->tanggal)->translatedFormat('d F Y') }}</td>
            </tr>

            <tr>
                <td><b>Pelanggan</b></td>
                <td>: {{ $transaksi->pelanggan->nama }}</td>
            </tr>

            <tr>
                <td><b>Kasir</b></td>
                <td>: {{ $transaksi->user->name }}</td>
            </tr>

        </table>

        <br>

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($transaksi->detail as $item)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->obat->nama }}</td>

                        <td>{{ $item->jumlah }}</td>

                        <td class="text-right">
                            Rp {{ number_format($item->harga) }}
                        </td>

                        <td class="text-right">
                            Rp {{ number_format($item->subtotal) }}
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

        <div class="total">

            TOTAL :
            Rp {{ number_format($transaksi->total) }}

        </div>

        <div class="footer">

            ===================================<br>

            Terima kasih telah berbelanja <br>

            Semoga lekas sembuh 😊

        </div>

    </div>

    <script>
        window.print();

        window.onafterprint = function() {

            history.back();

        }
    </script>

</body>

</html>
