@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Absensi</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

<div class="row">
    <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="fa-solid fa-check-to-slot"></i> ABSENSI IN</h5>
            <div class="card-body">
                <form action="/dashboard/absensi" method="POST">
                    @csrf
                    @foreach ($users as $user)
                      <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                      </div>
                      <div class="mb-3">
                      <label for="divisions_id" class="form-label">Division</label>
                        <input type="hidden" class="form-control" id="divisions_id" name="divisions_id" value="{{ $user->divisions_id }}" readonly>
                        <input type="text" class="form-control" value="{{ $user->division->name ?? 'Division does not exist' }}" readonly>
                      </div>
                      <div class="mb-3">
                          <label for="status" class="form-label">Status</label>
                          <select class="form-select" name="status">
                              <option value="Attend">Attend</option>
                              <option value="Sick">Sick</option>
                              <option value="Absent">Absent</option>
                            </select>
                      </div>
                      <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}" readonly>
                                </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-3">
                                <label for="in" class="form-label">Time In</label>
                                <input type="time" class="form-control" id="in" name="in" value="{{ date('H:i') }}" readonly>
                                </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="out" name="out" value="None" readonly>
                                </div>
                          </div>
                      </div>
                      @endforeach
                      <button type="submit" class="btn btn-dark">Submit</button>
                  </form>
            </div>
          </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3">
                <h5><i class="fa-solid fa-clock"></i> STATUS</h5>
                <h6>{{ date('d-m-Y')}} <h6 id="time"></h6></h6>
            </div>
            <div class="card-body">
                <h5>IN : {{ $absensi_in }}</h5>
                <h5>OUT : {{ $absensi_out }}</h5>
            </div>
          </div>

          <div class="mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3">
                    <h5><i class="fa-solid fa-circle-info"></i> Informations</h5>
                </div>
                <div class="card-body">
                    <p>
                        @if ($absensis)
                        If the exit attendance page does not appear, <a href="/dashboard/{{ $absensis->id }}/edit" class="fw-semibold">click here</a>. <br>
                        @endif

                        If you take a status other than <b class="text-decoration-underline">Attend</b>. then just fill in the attendance once.<br>

                        If there are difficulties or errors in the attendance please contact the admin.

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

<script>
    function updateTime() {
      const now = new Date();
      document.getElementById("time").textContent = now.toLocaleTimeString('ss');
    }

    setInterval(updateTime, 1000); // Update time every 1 second
  </script>

@endsection
