@extends('layouts.navbar')
@section('title', 'Saku Celana - Kode Rekening')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Kode Rekening</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a>
                            </li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Kode Rekening</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-start flex-wrap gap-2">
                                <div>
                                    <h5>Tabel Kode Rekening</h5>
                                </div>
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
                                                <th>Kode</th>
                                                <th>Nama Rekening</th>
                                                <th>Jenis</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->kode }}</td>
                                                    <td>{{ $item->nama_rekening }}</td>
                                                    <td>{{ ucfirst($item->jenis) }}</td>
                                                    <td class="text-center">
                                                        <!-- Tombol Edit -->
                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $item->id }}">
                                                            Edit
                                                        </button>
                                                        <!-- Tombol Delete -->
                                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $item->id }}">
                                                            Hapus
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('koderekening.update', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Kode Rekening</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label>Kode</label>
                                                                        <input type="text" name="kode"
                                                                            class="form-control"
                                                                            value="{{ $item->kode }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Nama Rekening</label>
                                                                        <textarea name="nama_rekening" class="form-control" rows="2" required>{{ $item->nama_rekening }}</textarea>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label>Jenis</label>
                                                                        <select name="jenis" class="form-select" required>
                                                                            <option value="">-- Pilih Jenis --
                                                                            </option>
                                                                            <option value="aktiva"
                                                                                {{ $item->jenis == 'aktiva' ? 'selected' : '' }}>
                                                                                Aktiva
                                                                            </option>
                                                                            <option value="hutang"
                                                                                {{ $item->jenis == 'hutang' ? 'selected' : '' }}>
                                                                                Hutang
                                                                            </option>
                                                                            <option value="modal"
                                                                                {{ $item->jenis == 'modal' ? 'selected' : '' }}>
                                                                                Modal
                                                                            </option>
                                                                            <option value="pendapatan"
                                                                                {{ $item->jenis == 'pendapatan' ? 'selected' : '' }}>
                                                                                Pendapatan
                                                                            </option>
                                                                            <option value="belanja"
                                                                                {{ $item->jenis == 'belanja' ? 'selected' : '' }}>
                                                                                Belanja
                                                                            </option>
                                                                        </select>
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

                                                <!-- Modal Delete -->
                                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('koderekening.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Hapus Kode Rekening</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Yakin ingin menghapus kode rekening:</p>
                                                                    <strong>{{ $item->nama_rekening }}</strong>
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

            {{-- MODAL CREATE --}}
            <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('koderekening.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Kode Rekening</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Kode</label>
                                    <input type="text" name="kode" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Nama Rekening</label>
                                    <textarea name="nama_rekening" class="form-control" rows="2" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Jenis</label>
                                    <select name="jenis" class="form-select" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="aktiva">Aktiva</option>
                                        <option value="hutang">Hutang</option>
                                        <option value="modal">Modal</option>
                                        <option value="pendapatan">Pendapatan</option>
                                        <option value="belanja">Belanja</option>
                                    </select>
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
