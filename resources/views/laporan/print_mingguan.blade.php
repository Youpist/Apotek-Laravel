<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Mingguan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            padding: 35px;
            color: #222;
            font-size: 14px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 30px;
            color: #198754;
        }

        .header h3 {
            margin-top: 5px;
        }

        .header p {
            color: #666;
            margin-top: 4px;
        }

        .info {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #198754;
            color: white;
            padding: 10px;
            border: 1px solid #ddd;
        }

        td {
            padding: 9px;
            border: 1px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        .summary {
            margin-top: 25px;
            width: 320px;
            float: right;
        }

        .summary table {
            width: 100%;
        }

        .summary td {
            padding: 10px;
        }

        .footer {
            clear: both;
            margin-top: 80px;
            text-align: center;
            color: #666;
        }

        @media print {

            body {
                padding: 15px;
            }

            @page {
                size: A4 portrait;
                margin: 12mm;
            }

        }
    </style>

</head>

<body>

    <div class="header">
        <h1>APOTEK SEHAT</h1>
        <p>Jl. Raya Margonda No.777</p>

        <h3>LAPORAN PENJUALAN MINGGUAN</h3>


        <p>
            Periode: {{ \Carbon\Carbon::parse($awal)->format('d F Y') }} -
            {{ \Carbon\Carbon::parse($akhir)->format('d F Y') }}
        </p>
    </div>

    <div class="info">

        <div>
            <b>Tanggal Cetak :</b>
            {{ date('d-m-Y H:i') }}
        </div>

        <div>
            <b>Total Transaksi :</b>
            {{ $transaksi->count() }}
        </div>

    </div>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Apoteker</th>
                <th>Total</th>
            </tr>

        </thead>

        <tbody>

            @php
                $total = 0;
            @endphp

            @foreach ($transaksi as $item)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->tanggal }}</td>

                    <td>{{ $item->pelanggan->nama }}</td>

                    <td>{{ $item->user->name }}</td>

                    <td>
                        Rp {{ number_format($item->total, 0, ',', '.') }}
                    </td>

                </tr>

                @php
                    $total += $item->total;
                @endphp
            @endforeach

        </tbody>

    </table>

    <div class="summary">

        <table>

            <tr>

                <td><b>Total Transaksi</b></td>

                <td>{{ $transaksi->count() }}</td>

            </tr>

            <tr>

                <td><b>Total Pendapatan</b></td>

                <td>

                    <b>
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </b>

                </td>

            </tr>

        </table>

    </div>

    <div class="footer">

        Laporan dibuat otomatis oleh Sistem Informasi Apotek

    </div>

    <script>
        window.onload = function() {

            window.print();

        }

        window.onafterprint = function() {

            history.back();

        }
    </script>

</body>

</html>
