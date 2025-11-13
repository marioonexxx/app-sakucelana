@extends('layouts.navbar')
@section('title', 'Saku Celana - Laporan Laba Rugi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Laporan Laba Rugi</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a>
                            </li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Laba Rugi</li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- Filter tanggal --}}
            <form method="GET" class="mb-3">
                <div class="row g-2">
                    <div class="col-md-3">
                        <input type="date" name="from" value="{{ $from }}" class="form-control"
                            placeholder="Dari Tanggal">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="to" value="{{ $to }}" class="form-control"
                            placeholder="Sampai Tanggal">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header">
                    <h5>Detail Laba Rugi</h5>
                </div>
                <div class="card-body">
                    <h6>Pendapatan</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Akun</th>
                                <th class="text-end">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendapatan as $p)
                                <tr>
                                    <td>{{ $p['coa']->kode }} - {{ $p['coa']->nama }}</td>
                                    <td class="text-end">{{ number_format($p['nilai'], 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Total Pendapatan</th>
                                <th class="text-end">{{ number_format($totalPendapatan, 2, ',', '.') }}</th>
                            </tr>
                        </tbody>
                    </table>

                    <h6>Beban / Biaya</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Akun</th>
                                <th class="text-end">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beban as $b)
                                <tr>
                                    <td>{{ $b['coa']->kode }} - {{ $b['coa']->nama }}</td>
                                    <td class="text-end">{{ number_format($b['nilai'], 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Total Beban</th>
                                <th class="text-end">{{ number_format($totalBeban, 2, ',', '.') }}</th>
                            </tr>
                            <tr>
                                <th>Laba Bersih</th>
                                <th class="text-end">{{ number_format($labaBersih, 2, ',', '.') }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
