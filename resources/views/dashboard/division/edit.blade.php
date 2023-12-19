@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Divisi</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row mb-3">
        <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="fa-solid fa-users"></i> Edit Data Divisi</h5>
            <div class="card-body mx-2">
                <form action="/dashboard/divisions/{{ $division->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Divisi</label>
                        <input type="name" class="form-control" id="name" name="name" placeholder="CEO" value="{{ old('name', $division->name) }}" required>
                    </div>
                    <a href="/dashboard/divisions" class="btn btn-outline-dark my-3">Kembali</a>
                    <button class="btn btn-dark" type="submit">Perbarui Divisi</button>
                </form>
            </div>
            </div>
        </div>

            <div class="col-6">
                <div class="card mb-3">
                    <h5 class="card-header p-3"><i class="fa-solid fa-circle-info"></i> Informasi</h5>
                    <div class="card-body">
                      <p>
                        Penambahan divisi harus sesuai dengan keperluan! <br>
                        Jika ada error maka perbaiki divisinya!
                      </p>
                    </div>
                  </div>
            </div>
    </div>

@endsection
