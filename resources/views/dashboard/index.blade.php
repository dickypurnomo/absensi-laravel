@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hello, {{ auth()->user()->name }}</h1>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h4>{{ date('l, d-m-Y')}}</h4>
        </div>
    </div>

    @if (auth()->user()->is_admin == '1')
    <div class="row">
        <div class="col-6">
            <div class="card mb-3">
                <h5 class="card-header p-3"><i class="fa-solid fa-clipboard-user"></i> Morning Attendance</h5>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">DATE</th>
                            <th scope="col">IN</th>
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
                                <td>{{ $absensi->in }}</td>
                                <td>{{ $absensi->status }}</td>
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
                <h5 class="card-header p-3"><i class="fa-solid fa-clipboard-user"></i> Afternoon Attendance</h5>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">DATE</th>
                            <th scope="col">OUT</th>
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
                <h5 class="card-header p-3"><i class="fa-solid fa-circle-info"></i> Absensi</h5>
                <div class="card-body">
                  <p>
                    @if ($absensi_by_name->where('date', date('Y-m-d'))->isEmpty())
                    <a href="/dashboard/absensi" class="text-decoration-none text-danger fw-bold">
                        <p><i class="fa-solid fa-triangle-exclamation"></i> You haven't taken attendance today! Please take attendance! <i class="fa-solid fa-triangle-exclamation"></i></p>
                    </a>
                    @else
                    <a href="/dashboard/absensi" class="text-decoration-none text-success fw-bold">
                        <p><i class="fa-solid fa-square-check"></i> Thank you for taking attendance today! <i class="fa-solid fa-square-check"></i></p>
                    </a>
                    @endif
                    </p>
                </div>
              </div>
        </div>
        <div class="col-6">
            <div class="card mb-3">
                <h5 class="card-header p-3"><i class="fa-solid fa-circle-info"></i> Informations</h5>
                <div class="card-body">
                  <p>
                    Don't forget to take attendance.<br>

                    If you forget your password, you can change it by contacting the admin.<br>

                    For data changes, you can do it yourself in the profile section.<br>
                    <div>
                        <b>Contact :</b><br>
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
