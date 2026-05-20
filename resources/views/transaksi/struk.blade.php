<!DOCTYPE html>
<html>

<head>

    <title>Struk Pembelian</title>

    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>

</head>

<body>

    <center>

        <h2>APOTEK SEHAT</h2>

        <p>
            Jl. Raya Margonda No. 777
        </p>

    </center>

    <hr>

    <p>
        <strong>Tanggal:</strong>
        {{ $transaksi->tanggal }}
    </p>

    <p>
        <strong>Pelanggan:</strong>
        {{ $transaksi->pelanggan->nama }}
    </p>

    <p>
        <strong>Apoteker:</strong>
        {{ $transaksi->user->name }}
    </p>

    <table>

        <thead>

            <tr>
                <th>Obat</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>

        </thead>

        <tbody>

            @foreach ($transaksi->detail as $item)
                <tr>

                    <td>
                        {{ $item->obat->nama_obat }}
                    </td>

                    <td>
                        Rp {{ number_format($item->harga) }}
                    </td>

                    <td>
                        {{ $item->jumlah }}
                    </td>

                    <td>
                        Rp {{ number_format($item->subtotal) }}
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <h3 style="margin-top:20px;">

        Total:
        Rp {{ number_format($transaksi->total) }}

    </h3>

    <br><br>

    <center>

        Terima kasih telah berbelanja

    </center>

    <script>
        window.print();

        window.onafterprint = function() {

            window.history.back();

        };
    </script>

</body>

</html>
