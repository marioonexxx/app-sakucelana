@extends('layouts.navbar')
@section('title', 'Saku Celana - Transaksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Transaksi Kasir</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a>
                            </li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Form tambah produk ke transaksi -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5>Tambah Produk</h5>
                            </div>
                            <div class="card-body">
                                <form id="addProductForm">
                                    @csrf
                                    <div class="row g-2 align-items-end">
                                        <div class="col-md-4">
                                            <label>Produk</label>
                                            <select name="produk_id" id="produk_id" class="form-select" required>
                                                <option value="">-- Pilih Produk --</option>
                                                @foreach ($produk as $p)
                                                    <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">
                                                        {{ $p->nama }} - Rp {{ number_format($p->harga, 0, ',', '.') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Qty</label>
                                            <input type="number" name="qty" id="qty" class="form-control"
                                                min="1" value="1" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Harga</label>
                                            <input type="text" name="harga" id="harga" class="form-control"
                                                readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="addProductBtn"
                                                class="btn btn-primary w-100">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Tabel daftar produk transaksi -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Detail Transaksi</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kasir.store') }}" method="POST" id="transaksiForm">
                                    @csrf
                                    <table class="table table-bordered" id="transaksiTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Subtotal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Row akan ditambahkan dengan JS -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" class="text-end">Total</th>
                                                <th><input type="text" name="total" id="total" class="form-control"
                                                        value="0" readonly></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <button type="submit" class="btn btn-success mt-2">Submit Transaksi</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            @endif
        });
    </script>
    <script>
        $(document).ready(function() {
            // Set harga otomatis saat pilih produk
            $('#produk_id').change(function() {
                var harga = $(this).find(':selected').data('harga') || 0;
                $('#harga').val(harga);
            });

            let count = 0;
            let total = 0;

            $('#addProductBtn').click(function() {
                let produk_id = $('#produk_id').val();
                let produk_nama = $('#produk_id option:selected').text();
                let qty = parseInt($('#qty').val());
                let harga = parseFloat($('#harga').val());
                if (!produk_id || qty <= 0 || harga <= 0) {
                    alert('Produk, qty, dan harga harus valid!');
                    return;
                }

                let subtotal = qty * harga;
                total += subtotal;
                $('#total').val(total);

                let row = `
            <tr data-subtotal="${subtotal}">
                <td>${count+1}</td>
                <td>
                    ${produk_nama}
                    <input type="hidden" name="produk_id[]" value="${produk_id}">
                </td>
                <td><input type="hidden" name="qty[]" value="${qty}">${qty}</td>
                <td><input type="hidden" name="harga[]" value="${harga}">${harga}</td>
                <td>${subtotal}</td>
                <td><button type="button" class="btn btn-sm btn-danger removeRow">Hapus</button></td>
            </tr>
        `;
                $('#transaksiTable tbody').append(row);
                count++;
            });

            // Hapus row
            $(document).on('click', '.removeRow', function() {
                let rowSubtotal = parseFloat($(this).closest('tr').data('subtotal'));
                total -= rowSubtotal;
                $('#total').val(total);
                $(this).closest('tr').remove();
            });
        });
    </script>
@endsection
