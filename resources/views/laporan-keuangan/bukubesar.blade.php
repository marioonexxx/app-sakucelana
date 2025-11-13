@extends('layouts.navbar')
@section('title', 'Saku Celana - Buku Besar')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Buku Besar</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a>
                            </li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Buku Besar</li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- Filter --}}
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('buku-besar.index') }}" method="GET" class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label>Dari Tanggal</label>
                            <input type="date" name="from" value="{{ request('from') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="to" value="{{ request('to') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Akun</label>
                            <select name="coa_id" class="form-select">
                                <option value="">-- Semua Akun --</option>
                                @foreach ($coas as $coa)
                                    <option value="{{ $coa->id }}" {{ request('coa_id') == $coa->id ? 'selected' : '' }}>
                                        {{ $coa->kode }} - {{ $coa->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('buku-besar.index') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Tabel Buku Besar --}}
            <div class="card">
                <div class="card-header">
                    <h5>Daftar Transaksi</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="bukuBesarTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $saldo = $saldoAwal;
                                    $totalDebit = 0;
                                    $totalKredit = 0;
                                @endphp

                                {{-- Saldo Awal --}}
                                @if ($saldoAwal != 0)
                                    <tr class="table-warning">
                                        <td colspan="5"><strong>Saldo Awal</strong></td>
                                        <td class="text-end"><strong>{{ number_format($saldoAwal, 2, ',', '.') }}</strong>
                                        </td>
                                    </tr>
                                @endif

                                @foreach ($jurnals as $index => $jurnal)
                                    @php
                                        $saldo += $jurnal->debit - $jurnal->kredit;
                                        $totalDebit += $jurnal->debit;
                                        $totalKredit += $jurnal->kredit;
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($jurnal->tgl_transaksi)->isoFormat('D MMMM YYYY') }}
                                        </td>
                                        <td>{{ $jurnal->keterangan ?? '-' }}</td>
                                        <td class="text-end">{{ number_format($jurnal->debit, 2, ',', '.') }}</td>
                                        <td class="text-end">{{ number_format($jurnal->kredit, 2, ',', '.') }}</td>
                                        <td class="text-end">{{ number_format($saldo, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Total</th>
                                    <th class="text-end">{{ number_format($totalDebit, 2, ',', '.') }}</th>
                                    <th class="text-end">{{ number_format($totalKredit, 2, ',', '.') }}</th>
                                    <th class="text-end">{{ number_format($saldo, 2, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#bukuBesarTable')) {
                $('#bukuBesarTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    order: [
                        [1, 'asc']
                    ]
                });
            }
        });
    </script>
@endsection
