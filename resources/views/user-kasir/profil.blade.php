@extends('layouts.navbar')
@section('title', 'Dashboard - Profil Pengguna')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Profil Pengguna</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('keuangan.dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>

                            <li class="breadcrumb-item active">Profil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Profil Pengguna : {{ Auth::user()->name }}</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa-solid fa-gear fa-spin"></i></li>
                                    <li><i class="view-html fa-solid fa-code"></i></li>
                                    <li><i class="icofont icofont-maximize full-card"></i></li>
                                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                                    <li><i class="icofont icofont-refresh reload-card"></i></li>
                                    <li><i class="icofont icofont-error close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Form Update Data -->
                            <form action="{{ route('kasir.updateprofil', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Foto -->
                                <div class="mb-3 text-center">
                                    <img id="profile-photo"
                                        src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/default.png') }}"
                                        alt="Profile Photo" class="img-thumbnail rounded-circle"
                                        style="width: 256px; height: 256px; object-fit: cover; cursor:pointer;">
                                    <input type="file" id="photo-input" name="photo" class="d-none" accept="image/*">
                                </div>

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>

                               

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password">Password (kosongkan jika tidak ganti)</label>
                                    <input type="password" class="form-control" name="password">
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>






                    </div>
                </div>
            </div>

        </div><!-- Container-fluid Ends-->
    </div>
@endsection

@push('scripts')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
                customClass: {
                    confirmButton: 'swal2-confirm-custom'
                }
            });
        </script>

        <style>
            .swal2-confirm-custom {
                color: white !important;
                /* warna teks putih */
            }
        </style>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK' // ✅ Tambahkan tombol OK
            });
        </script>
    @endif

    <script>
        // klik foto untuk buka file input
        document.getElementById('profile-photo').addEventListener('click', function() {
            document.getElementById('photo-input').click();
        });

        // preview foto sebelum submit
        document.getElementById('photo-input').addEventListener('change', function() {
            let file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-photo').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>




@endpush
