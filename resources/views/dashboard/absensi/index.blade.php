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
            <h5 class="card-header p-3"><i class="fa-solid fa-check-to-slot"></i> Absensi Masuk</h5>
            <div class="card-body">
                <form action="/dashboard/absensi" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach ($users as $user)
                      <div class="mb-3">
                      <label for="name" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                      </div>
                      <div class="mb-3">
                      <label for="divisions_id" class="form-label">Divisi</label>
                        <input type="hidden" class="form-control" id="divisions_id" name="divisions_id" value="{{ $user->divisions_id }}" readonly>
                        <input type="text" class="form-control" value="{{ $user->division->name ?? 'DIVISI TIDAK DITEMUKAN! SILAHKAN HUBUNGI ADMIN!' }}" readonly>
                      </div>
                      <div class="mb-3">
                          <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status">
                              <option value="Hadir">Hadir</option>
                              <option value="Sakit">Sakit</option>
                              <option value="Cuti">Cuti</option>
                            </select>
                      </div>

                      <div class="mb-3 d-none" id="bukti_sakit">
                        <label for="bukti_sakit" class="form-label">Unggah Bukti</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" class="form-control" name="image" id="image" onchange="previewImage()" aria-describedby="buktiSakit">
                        <div id="buktiSakit" class="form-text">Silahkan unggah bukti sakit! Pastikan tidak lebih dari <b>1MB.</b></div>
                      </div>

                      <div class="mb-3 d-none" id="alasan-cuti">
                        <label for="alasan_cuti" class="form-label">Alasan Cuti</label>
                        <textarea name="reason" class="form-control" rows="2"></textarea>
                      </div>

                      <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}" readonly>
                                </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-3">
                                <label for="in" class="form-label">Jam</label>
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
                      <button type="submit" class="btn btn-dark">Kirim</button>
                  </form>
            </div>
          </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3">
                <h5><i class="fa-solid fa-clock"></i> Waktu</h5>
                <h6>{{ date('d-m-Y')}} <h6 id="time"></h6></h6>
            </div>
            <div class="card-body">
                @if ($absensis?->date === date('Y-m-d'))
                <h5>MASUK : {{ $absensi_in }}</h5>
                <h5>KELUAR : {{ $absensi_out }}</h5>
                @else
                <h5>MASUK : -</h5>
                <h5>KELUAR : -</h5>
                @endif
            </div>
          </div>

          <div class="mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3">
                    <h5><i class="fa-solid fa-circle-info"></i> Informasi</h5>
                </div>
                <div class="card-body">
                    <p>
                        Jika <b>absensi keluar</b> tidak muncul silahkan klik <a href="/dashboard/absensi/{{ $absensis?->id }}/edit" class="fw-bold text-dark text-decoration-none">disini</a>. <br>

                        Jika kamu menggambil absensi selain <b>Hadir</b> maka cukup isi absensi satu kali saja. <br>

                        Jika ada kesulitan atau error silahkan hubungi <b>Admin.</b>

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

    <script>
    const select = document.querySelector("select[name='status']");

    select.addEventListener("change", function() {
        const value = select.value;

        if (value === "Sakit") {
            document.querySelector("#bukti_sakit").classList.remove("d-none");
            document.querySelector("#alasan-cuti").classList.add("d-none");
        } else if (value === "Hadir") {
            document.querySelector("#bukti_sakit").classList.add("d-none");
            document.querySelector("#alasan-cuti").classList.add("d-none");
        } else if (value === "Cuti") {
            document.querySelector("#bukti_sakit").classList.add("d-none");
            document.querySelector("#alasan-cuti").classList.remove("d-none");
        }
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function updateTime() {
      const now = new Date();
      document.getElementById("time").textContent = now.toLocaleTimeString('ss');
    }

    setInterval(updateTime, 1000); // Update time every 1 second
  </script>

@endsection
