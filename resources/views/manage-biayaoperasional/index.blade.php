@extends('layouts.navbar')
@section('title', 'Saku Celana - Biaya Operasional')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Biaya Operasional</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a>
                            </li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Biaya Operasional</li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- Card --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-start flex-wrap gap-2">
                                <h5>Tabel Biaya Operasional</h5>
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#createModal">
                                    <i class="fa-solid fa-plus-circle"></i> Add
                                </button>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Akun Biaya (Debit)</th>
                                                <th>Akun Lawan (Kredit)</th>
                                                <th>Nilai</th>
                                                <th>Bukti</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tgl_transaksi)->isoFormat('D MMMM YYYY') }}</td>
                                                    <td>{{ $item->coa->kode ?? '-' }} - {{ $item->coa->nama ?? '-' }}</td>
                                                    <td>{{ $item->coa->lawan->kode ?? '-' }} -
                                                        {{ $item->coa->lawan->nama ?? '-' }}</td>
                                                    <td class="text-end">{{ number_format($item->nilai, 2, ',', '.') }}</td>
                                                    <td class="text-center">
                                                        @if ($item->bukti)
                                                            <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank"
                                                                class="btn btn-sm btn-outline-info">
                                                                <i class="fa-solid fa-file"></i> Lihat
                                                            </a>
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->keterangan ?? '-' }}</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $item->id }}">Edit</button>
                                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $item->id }}">Hapus</button>
                                                    </td>
                                                </tr>

                                                {{-- Edit Modal --}}
                                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('biaya-operasional.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Biaya Operasional</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label>Tanggal Transaksi</label>
                                                                        <input type="date" name="tgl_transaksi"
                                                                            value="{{ $item->tgl_transaksi }}"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Akun Biaya (Debit)</label>
                                                                        <select name="coa_id" class="form-select" required>
                                                                            <option value="">-- Pilih Akun Biaya --
                                                                            </option>
                                                                            @foreach ($coas as $coa)
                                                                                <option value="{{ $coa->id }}"
                                                                                    {{ $coa->id == $item->coa_id ? 'selected' : '' }}>
                                                                                    {{ $coa->kode }} -
                                                                                    {{ $coa->nama }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Nilai</label>
                                                                        <input type="number" name="nilai"
                                                                            value="{{ $item->nilai }}"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Bukti (PDF/JPG)</label>
                                                                        <input type="file" name="bukti"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Keterangan</label>
                                                                        <textarea name="keterangan" class="form-control" rows="3">{{ $item->keterangan }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary">Update</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                {{-- Delete Modal --}}
                                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('biaya-operasional.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Hapus Data</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Yakin ingin menghapus data
                                                                        <strong>{{ $item->coa->nama }}</strong>?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger">Hapus</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Create Modal --}}
            <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('biaya-operasional.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Biaya Operasional</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Tanggal Transaksi</label>
                                    <input type="date" name="tgl_transaksi" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Akun Biaya (Debit)</label>
                                    <select name="coa_id" class="form-select" required>
                                        <option value="">-- Pilih Akun Biaya --</option>
                                        @foreach ($coas as $coa)
                                            <option value="{{ $coa->id }}">{{ $coa->kode }} -
                                                {{ $coa->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Nilai</label>
                                    <input type="number" name="nilai" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Bukti (PDF/JPG)</label>
                                    <input type="file" name="bukti" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true
                });
            }
        });
    </script>
@endsection
