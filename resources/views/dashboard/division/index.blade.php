@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Divisi</h1>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <a href="/dashboard/divisions/create" class="btn btn-dark">Tambah Data</a>
        </div>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        <div class="col-6">
            <div class="card mb-3">
                <h5 class="card-header p-3"><i class="fa-solid fa-circle-info"></i> Divisi</h5>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAMA DIVISI</th>
                            <th scope="col">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $division)
                            <tr>
                                <th scope="row">{{ $division->id }}</th>
                                <td>{{ $division->name }}</td>
                                <td><a href="/dashboard/divisions/{{ $division->id }}/edit" class="badge bg-dark border-0"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="/dashboard/divisions/{{ $division->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="badge bg-dark border-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
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

    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-circle-exclamation"></i> Konfirmasi Hapus</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h5>Apakah Anda yakin ingin menghapus data ini?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form action="/dashboard/divisions/{{ $division->id }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
