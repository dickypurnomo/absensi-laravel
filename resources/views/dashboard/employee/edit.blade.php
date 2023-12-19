@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Karyawan</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
        <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="fa-solid fa-user-plus"></i> Edit Data Karyawan</h5>
            <div class="card-body mx-2">
                <form action="/dashboard/employees/{{ $user->id }}" method="POST">
                    @method('put')
                    @csrf
                        <div class="row">
                        <div class="mb-3">
                          <label for="name" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $user->name) }}">
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3">
                          <label for="address" class="form-label">Alamat</label>
                          <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}">
                        </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="divisions_id" class="form-label">Divisi</label>
                                <select class="form-select" id="divisions_id" name="divisions_id" required>
                                    @foreach ($divisions as $division)
                                    @if (old('divisions_id', $user->divisions_id) == $division->id)
                                    <option value="{{ $division->id }}" selected>{{ $division->name }}</option>
                                    @else
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                </div>
                        <div class="mb-3">
                          <label for="phonenumber" class="form-label">Nomor Telepon</label>
                          <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}"required>
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3 col-6">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <a href="/dashboard/employees" class="btn btn-outline-dark my-3">Kembali</a>
                    <button class="btn btn-dark" type="submit">Perbarui Data</button>
                </form>
                </div>
                </div>
          </div>

          <div class="col-6">
            <div class="card mb-3">
                <h5 class="card-header p-3"><i class="fa-solid fa-circle-info"></i> Informasi</h5>
                <div class="card-body">
                  <p>
                    Jika user tidak meminta merubah password maka biarkan password kosong!<br>
                    Password diisi ketika user meminta perubahan password.<br>

                    <div class="mb-3">
                        <b>Contoh Data :</b><br>
                        Gaetano Dickens | Financial<br>
                        carlos.prohaska@example.com<br>
                        1-606-295-5725<br>
                        502 Zack Spur Apt. 644 Lake Drewberg, MI 33972-3678
                    </div>

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
