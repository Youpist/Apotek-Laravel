@extends('layouts.app')

@section('content')
    <div class="card shadow border-0">

        <div class="card-header">
            <h4>Transaksi Baru</h4>
        </div>

        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('transaksi.store') }}" method="POST">

                @csrf

                {{-- Pelanggan --}}
                <div class="mb-3">

                    <label>Pelanggan</label>

                    <select name="pelanggan_id" class="form-control">

                        @foreach ($pelanggan as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <table class="table table-bordered" id="tableObat">

                    <thead>

                        <tr>

                            <th>Obat</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>

                                <select name="obat_id[]" class="form-control obatSelect">

                                    @foreach ($obat as $item)
                                        <option value="{{ $item->id }}" data-stok="{{ $item->stok }}" data-harga="{{ $item->harga }}">

                                           {{ $item->kode_obat }} - {{ $item->nama_obat }}
                                            - Stok: {{ $item->stok }}

                                        </option>
                                    @endforeach

                                </select>

                            </td>

                            <td>

                                <input type="text" class="form-control hargaInput" readonly>

                            </td>

                            <td>

                                <input type="number" name="jumlah[]" class="form-control" min="1" required>

                            </td>

                            <td>

                                <button type="button" class="btn btn-danger removeRow">

                                    Hapus

                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

                <button type="button" class="btn btn-primary mb-3" id="addRow">

                    Tambah Obat

                </button>

                <br>

                <button class="btn btn-success">

                    Simpan Transaksi

                </button>

            </form>

        </div>

    </div>

    <script>
        function setHarga(row) {
            let select =
                row.querySelector('.obatSelect');

            let harga =
                select.options[
                    select.selectedIndex
                ].dataset.harga;

            row.querySelector('.hargaInput')
                .value =
                'Rp ' +
                parseInt(harga)
                .toLocaleString('id-ID');
        }

        // SET HARGA AWAL
        document.querySelectorAll(
            '#tableObat tbody tr'
        ).forEach(function(row) {

            setHarga(row);

        });

        // SAAT SELECT BERUBAH
        document.addEventListener(
            'change',
            function(e) {

                if (
                    e.target.classList.contains(
                        'obatSelect'
                    )
                ) {

                    let row =
                        e.target.closest('tr');

                    setHarga(row);

                }

            }
        );

        // TAMBAH ROW
        document.getElementById('addRow')
            .addEventListener(
                'click',
                function() {

                    let tbody =
                        document.querySelector(
                            '#tableObat tbody'
                        );

                    let newRow =
                        tbody.rows[0].cloneNode(true);

                    newRow.querySelectorAll('input')
                        .forEach(input => {

                            input.value = '';

                        });

                    tbody.appendChild(newRow);

                    setHarga(newRow);

                }
            );

        // HAPUS ROW
        document.addEventListener(
            'click',
            function(e) {

                if (
                    e.target.classList.contains(
                        'removeRow'
                    )
                ) {

                    let rows =
                        document.querySelectorAll(
                            '#tableObat tbody tr'
                        );

                    if (rows.length > 1) {

                        e.target.closest('tr')
                            .remove();

                    }

                }

            }
        );
    </script>
@endsection
