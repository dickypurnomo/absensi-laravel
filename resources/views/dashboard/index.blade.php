@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Halo, {{ auth()->user()->name }}</h1>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h4>{{ date('l, d-m-Y')}}</h4>
        </div>
    </div>

    @if (auth()->user()->is_admin == '1')
    <div class="row">
        <div class="col-6">
            <div class="card mb-3">
                <h5 class="card-header p-3"><i class="fa-solid fa-clipboard-user"></i> Daftar Kehadiran</h5>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">JAM MASUK</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensis as $absensi)
                            @if (date('Y-m-d') === $absensi->date)
                            <tr>
                                <th scope="row">{{ $absensi->id }}</th>
                                <td>{{ $absensi->name }}</td>
                                <td>{{ $absensi->date }}</td>
                                <td>{{ $absensi->in }}</td>
                                <td>{{ $absensi->status }}</td>
                                <td><a href="/dashboard/absensi/{{ $absensi->id }}" class="badge bg-dark border-0"><i class="fa-solid fa-eye"></i></a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                      </table>
                </div>
              </div>
        </div>
        <div class="col-6">
            <div class="card mb-3">
                <h5 class="card-header p-3"><i class="fa-solid fa-clipboard-user"></i> Daftar Kepulangan</h5>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">JAM KELUAR</th>
                            <th scope="col">STATUS</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensis as $absensi)
                            @if (date('Y-m-d') === $absensi->date)
                            <tr>
                                <th scope="row">{{ $absensi->id }}</th>
                                <td>{{ $absensi->name }}</td>
                                <td>{{ $absensi->date }}</td>
                                <td>{{ $absensi->out }}</td>
                                <td>{{ $absensi->status }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                      </table>
                </div>
              </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-6">
            <div class="card mb-3">
                <h5 class="card-header p-3"><i class="fa-solid fa-circle-info"></i> Status absensi hari ini!</h5>
                <div class="card-body">
                  <p>
                    @if ($absensi_by_name->where('date', date('Y-m-d'))->isEmpty())
                    <a href="/dashboard/absensi" class="text-decoration-none text-danger fw-bold">
                        <p><i class="fa-solid fa-triangle-exclamation"></i> Kamu belum mengambil absensi hari ini! <i class="fa-solid fa-triangle-exclamation"></i></p>
                    </a>
                    @else
                    <a href="/dashboard/absensi" class="text-decoration-none text-success fw-bold">
                        <p><i class="fa-solid fa-square-check"></i> Terima kasih sudah hadir untuk hari ini! <i class="fa-solid fa-square-check"></i></p>
                    </a>
                    @endif
                    </p>
                </div>
              </div>
        </div>
        <div class="col-6">
            <div class="card mb-3">
                <h5 class="card-header p-3"><i class="fa-solid fa-circle-info"></i> Informasi</h5>
                <div class="card-body">
                  <p>
                    Jangan lupa untuk mengambil absensi hari ini.<br>

                    Jika kamu lupa dengan password kamu, maka silahkan hubungi Admin!<br>

                    Untuk perubahan data, bisa dilakukan di <a href="/dashboard/profile" class="text-dark fw-bold text-decoration-none">Profil</a>.<br>
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
    @endif
@endsection
