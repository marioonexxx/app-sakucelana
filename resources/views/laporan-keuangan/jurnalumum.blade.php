@extends('layouts.navbar')
@section('title', 'Saku Celana - Jurnal Umum')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Jurnal Umum</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a>
                            </li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Jurnal Umum</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                {{-- Filter Form --}}
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('jurnal-umum.index') }}" method="GET" class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label for="from" class="form-label">Dari Tanggal</label>
                                <input type="date" name="from" id="from" value="{{ request('from') }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="to" class="form-label">Sampai Tanggal</label>
                                <input type="date" name="to" id="to" value="{{ request('to') }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('jurnal-umum.index') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Tabel Jurnal --}}
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Jurnal</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="jurnalTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Akun (Debit/Kredit)</th>
                                        <th>Lawan</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalDebit = 0;
                                        $totalKredit = 0;
                                    @endphp
                                    @foreach ($jurnals as $index => $jurnal)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($jurnal->tgl_transaksi)->isoFormat('D MMMM YYYY') }}
                                            </td>
                                            <td>{{ $jurnal->coa->kode ?? '-' }} - {{ $jurnal->coa->nama ?? '-' }}</td>
                                            <td>{{ $jurnal->coa->lawan->kode ?? '-' }} -
                                                {{ $jurnal->coa->lawan->nama ?? '-' }}</td>
                                            <td class="text-end">
                                                {{ number_format($jurnal->debit, 2, ',', '.') }}
                                                @php $totalDebit += $jurnal->debit; @endphp
                                            </td>
                                            <td class="text-end">
                                                {{ number_format($jurnal->kredit, 2, ',', '.') }}
                                                @php $totalKredit += $jurnal->kredit; @endphp
                                            </td>
                                            <td>{{ $jurnal->keterangan ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-end">Total</th>
                                        <th class="text-end">{{ number_format($totalDebit, 2, ',', '.') }}</th>
                                        <th class="text-end">{{ number_format($totalKredit, 2, ',', '.') }}</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
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
            if (!$.fn.DataTable.isDataTable('#jurnalTable')) {
                $('#jurnalTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    order: [
                        [1, 'desc']
                    ]
                });
            }
        });
    </script>
@endsection
