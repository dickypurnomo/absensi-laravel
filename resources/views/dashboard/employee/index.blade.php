@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Karyawan</h1>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <a href="/dashboard/employees/create" class="btn btn-dark">Tambah Data</a>
    </div>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col">
        <div class="card mb-3">
            <h5 class="card-header p-3"><i class="fa-solid fa-user"></i> Karyawan</h5>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">DIVISI</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">NOMOR TELEPON</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>

                            <td>
                                @if ($user->division)
                                  {{ $user->division->name }}
                                @else
                                  <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Division does not exist</p>
                                @endif
                            </td>

                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phonenumber }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="/dashboard/employees/{{ $user->id }}/edit" class="badge bg-dark border-0"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="/dashboard/employees/{{ $user->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="button" class="badge bg-dark border-0" data-bs-toggle="modal" data-bs-target="#deleteData"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
    </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="deleteData" tabindex="-1" aria-labelledby="deleteDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteDataLabel"><i class="fa-solid fa-circle-exclamation"></i> Konfirmasi Hapus</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h5>Apakah Anda yakin ingin menghapus data ini?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form action="/dashboard/employees/{{ $user->id }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
