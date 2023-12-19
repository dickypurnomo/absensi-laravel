@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Profil Karyawan</h1>
</div>
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="fa-solid fa-user"></i> Data Diri</h5>
            <div class="card-body">
                @foreach ($users as $user)
                @if ($loop->first)
                  <h1 class="fs-4 mb-0">{{ $user->name }}</h1>
                    <p class="fs-5 my-0">
                        @if ($user->division)
                            {{ $user->division->name }}
                        @else
                            <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> DIVISI TIDAK ADA! SILAHKAN HUBUNGI ADMIN!</p>
                        @endif
                    | {{ $user->email }}<br>
                    {{ $user->phonenumber }}<br>
                    {{ $user->address }}
                    </p>
                @endif
                @endforeach
            </div>
          </div>
          <a href="/dashboard/profile/{{ $user->id }}/edit" class="btn btn-dark mt-3">Edit Profil</a>
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
                    3. Alamat Email<br>

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
