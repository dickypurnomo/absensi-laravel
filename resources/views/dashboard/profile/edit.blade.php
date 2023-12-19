@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Diri</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-8" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
        <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="fa-solid fa-user"></i> Edit Data Diri</h5>
            <div class="card-body mx-2">
                <form action="/dashboard/profile/{{ $user->id }}" method="POST">
                    @method('put')
                    @csrf
                        <div class="row">
                        <div class="mb-3">
                          <label for="name" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" readonly>
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3">
                          <label for="address" class="form-label">Alamat</label>
                          <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}" required>
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3 col-6">
                          <label for="divisions_id" class="form-label">Divisi</label>
                          <input type="hidden" class="form-control" id="divisions_id" name="divisions_id" value="{{ $user->divisions_id }}" readonly required>
                          <input type="text" class="form-control" value="{{ $user->division->name ?? 'DIVISI TIDAK DITEMUKAN! SILAHKAN HUBUNGI ADMIN!' }}" readonly required>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="phonenumber" class="form-label">Nomor Telepon</label>
                          <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}" required>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <a href="/dashboard/profile" class="btn btn-outline-dark my-3">Kembali</a>
                    <button class="btn btn-dark" type="submit">Perbarui Data</button>
                </form>
                </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3">
                    <h5><i class="fa-solid fa-circle-info"></i> Informasi</h5>
                </div>
                <div class="card-body">
                    <p>
                        Kamu bisa mengubah beberapa data berikut<br>
                        1. Alamat<br>
                        2. Nomor Telepon<br>
                        3. Alamat Email<br><br>

                        Untuk melakukan perubahan Data Diri silahkan masukan Password!.<br>

                        Untuk perubahan yang lainnya silahkan hubungi Admin.

                        <div>
                            <b>Kontak :</b><br>
                            <p class="text-dark text-decoration-none">
                            <i class="fa-solid fa-envelope"></i> contact@kirinpeformance.com<br>
                            <i class="fa-solid fa-phone my-2"></i> +1 (213) 123-123<br>
                            <i class="fa-solid fa-location-dot"></i> SCOTTSDALE, AZ 85253 USA
                            </p>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection


