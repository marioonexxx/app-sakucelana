@extends('layouts.navbar')
@section('title', 'Saku Celana - Transaksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Daftar Transaksi</h3>
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

            <!-- Table Transaksi -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Tabel Transaksi</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="transaksiTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nomor</th>
                                                <th>Tanggal</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi as $index => $t)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $t->nomor_transaksi }}</td>
                                                    <td>{{ Carbon\Carbon::parse($t->tanggal)->translatedFormat('d F Y') }}
                                                    </td>

                                                    <td>Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#detailModal{{ $t->id }}">
                                                            Detail
                                                        </button>
                                                        <form action="{{ route('transaksi.destroy', $t->id) }}"
                                                            method="POST" style="display:inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modals Detail Transaksi -->
            @foreach ($transaksi as $t)
                <div class="modal fade" id="detailModal{{ $t->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Transaksi: {{ $t->nomor_transaksi }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Tanggal:</strong> {{ $t->tanggal }}</p>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Produk</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($t->detail as $i => $d)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $d->produk->nama }}</td>
                                                <td>{{ $d->qty }}</td>
                                                <td>Rp {{ number_format($d->harga, 0, ',', '.') }}</td>
                                                <td>Rp {{ number_format($d->subtotal, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p class="text-end"><strong>Total: Rp {{ number_format($t->total, 0, ',', '.') }}</strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#transaksiTable')) {
                $('#transaksiTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true
                });
            }
        });
    </script>
@endsection
