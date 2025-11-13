@extends('layouts.navbar')
@section('title', 'Saku Celana - Neraca Saldo')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Neraca Saldo</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a>
                            </li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Neraca Saldo</li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- Filter --}}
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('neraca-saldo.index') }}" method="GET" class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label>Dari Tanggal</label>
                            <input type="date" name="from" value="{{ $from }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="to" value="{{ $to }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('neraca-saldo.index') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Tabel Neraca Saldo --}}
            <div class="card">
                <div class="card-header">
                    <h5>Daftar Akun</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="neracaSaldoTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Akun</th>
                                    <th>Nama Akun</th>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalDebit = 0;
                                    $totalKredit = 0;
                                    $totalSaldo = 0;
                                @endphp
                                @foreach ($neraca as $index => $row)
                                    @php
                                        $totalDebit += $row['debit'];
                                        $totalKredit += $row['kredit'];
                                        $totalSaldo += $row['saldo'];
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $row['coa']->kode }}</td>
                                        <td>{{ $row['coa']->nama }}</td>
                                        <td class="text-end">{{ number_format($row['debit'], 2, ',', '.') }}</td>
                                        <td class="text-end">{{ number_format($row['kredit'], 2, ',', '.') }}</td>
                                        <td class="text-end">{{ number_format($row['saldo'], 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Total</th>
                                    <th class="text-end">{{ number_format($totalDebit, 2, ',', '.') }}</th>
                                    <th class="text-end">{{ number_format($totalKredit, 2, ',', '.') }}</th>
                                    <th class="text-end">{{ number_format($totalSaldo, 2, ',', '.') }}</th>
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
            if (!$.fn.DataTable.isDataTable('#neracaSaldoTable')) {
                $('#neracaSaldoTable').DataTable({
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
