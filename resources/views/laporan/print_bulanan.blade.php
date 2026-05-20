<!DOCTYPE html>
<html>
<head>

    <title>
        Cetak Laporan Bulanan
    </title>

    <style>

        body{
            font-family: Arial;
            padding:20px;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:10px;
        }

    </style>

</head>
<body>

    <center>

        <h2>APOTEK SEHAT</h2>

        <h3>Laporan Bulanan</h3>

    </center>

    <hr>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Pelanggan</th>
                <th>Apoteker</th>
                <th>Tanggal</th>
                <th>Total</th>

            </tr>

        </thead>

        <tbody>

            @foreach($transaksi as $item)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $item->pelanggan->nama ?? '-' }}
                </td>

                <td>
                    {{ $item->user->name ?? '-' }}
                </td>

                <td>
                    {{ $item->tanggal }}
                </td>

                <td>
                    Rp {{ number_format($item->total) }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <h3 style="margin-top:20px;">

        Total Pendapatan:
        Rp {{ number_format($total) }}

    </h3>

    <script>

        window.print();

        window.onafterprint = function(){

            window.history.back();

        }

    </script>

</body>
</html>