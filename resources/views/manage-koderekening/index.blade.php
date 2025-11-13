@extends('layouts.navbar')
@section('title', 'Saku Celana - Daftar COA')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Daftar Chart of Account (COA)</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a>
                            </li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">COA</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Tabel Akun</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="fa fa-plus-circle"></i> Tambah Akun
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode</th>
                                        <th>Nama Akun</th>
                                        <th>Tipe</th>
                                        <th>Normal</th>
                                        <th>Lawan Akun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->tipe }}</td>
                                            <td>{{ $item->normal }}</td>
                                            <td>{{ $item->lawan?->nama ?? '-' }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $item->id }}">Edit</button>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $item->id }}">Hapus</button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('coa.update', $item->id) }}" method="POST">
                                                    @csrf @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Akun</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label>Kode</label>
                                                                <input type="text" name="kode" class="form-control"
                                                                    value="{{ $item->kode }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Nama Akun</label>
                                                                <textarea name="nama" class="form-control" rows="2" required>{{ $item->nama }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Tipe</label>
                                                                <select name="tipe" class="form-select" required>
                                                                    @foreach (['Aktiva', 'Hutang', 'Modal', 'Pendapatan', 'Beban'] as $tipe)
                                                                        <option value="{{ $tipe }}"
                                                                            {{ $item->tipe == $tipe ? 'selected' : '' }}>
                                                                            {{ $tipe }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Normal</label>
                                                                <select name="normal" class="form-select" required>
                                                                    <option value="Debit"
                                                                        {{ $item->normal == 'Debit' ? 'selected' : '' }}>
                                                                        Debit</option>
                                                                    <option value="Kredit"
                                                                        {{ $item->normal == 'Kredit' ? 'selected' : '' }}>
                                                                        Kredit</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Lawan Akun</label>
                                                                <select name="lawan_id" class="form-select">
                                                                    <option value="">-- Tidak Ada --</option>
                                                                    @foreach ($data as $akun)
                                                                        @if ($akun->id != $item->id)
                                                                            <option value="{{ $akun->id }}"
                                                                                {{ $item->lawan_id == $akun->id ? 'selected' : '' }}>
                                                                                {{ $akun->kode }} - {{ $akun->nama }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
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
                                                <form action="{{ route('coa.destroy', $item->id) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Akun</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Yakin ingin menghapus akun:</p>
                                                            <strong>{{ $item->nama }}</strong>
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

            {{-- Modal Create --}}
            <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('coa.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Akun</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Kode</label>
                                    <input type="text" name="kode" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Nama Akun</label>
                                    <textarea name="nama" class="form-control" rows="2" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Tipe</label>
                                    <select name="tipe" class="form-select" required>
                                        <option value="">-- Pilih Tipe --</option>
                                        @foreach (['Aktiva', 'Hutang', 'Modal', 'Pendapatan', 'Beban'] as $tipe)
                                            <option value="{{ $tipe }}">{{ $tipe }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Normal</label>
                                    <select name="normal" class="form-select" required>
                                        <option value="Debit">Debit</option>
                                        <option value="Kredit">Kredit</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Lawan Akun</label>
                                    <select name="lawan_id" class="form-select">
                                        <option value="">-- Tidak Ada --</option>
                                        @foreach ($data as $akun)
                                            <option value="{{ $akun->id }}">{{ $akun->kode }} -
                                                {{ $akun->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary">Simpan</button>
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
                $('#dataTable').DataTable();
            }
        });
    </script>
@endsection
