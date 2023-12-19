@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Absensi</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header"><i class="fa-solid fa-circle-info"></i> Detail Absensi</h5>
                <div class="card-body">
                  <p class="card-text">
                        <b>Nama :</b> {{ $absensi->name }} <br>
                        <b>Divisi :</b> {{ $absensi->division->name }}<br>
                        <b>Tanggal :</b> {{ $absensi->date }}<br>
                        <b>Jam Masuk :</b> {{ $absensi->in }}<br>
                        <b>Jam Keluar :</b> {{ $absensi->out }}<br>
                        <b>Status :</b> {{ $absensi->status }}<br>
                        <b>Bukti :</b> <button class="badge bg-dark border-0 text-decoration-none" data-image-src="{{ asset('storage/' . $absensi->image) }}">Lihat Bukti</button><br>
                        <b>Alasan :</b> {{ $absensi->reason }}
                  </p>
                </div>
              </div>
              <div class="pt-3">
                  <a href="/dashboard" class="btn btn-dark">Kembali</a>
              </div>
        </div>

        <div class="col-6">
            <div class="card">
                <h5 class="card-header"><i class="fa-solid fa-image"></i> Detail Bukti Sakit</h5>
                <div class="card-body">
                    <img id="proofImage" src="" alt="Bukti" style="display: none;">
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
        var badge = document.querySelector('.badge');
        var proofImage = document.getElementById('proofImage');

        if(badge && proofImage) {
            badge.addEventListener('click', function(event) {
            event.preventDefault();
            var imgSrc = this.getAttribute('data-image-src');

            if (imgSrc) {
                if (proofImage.style.display === 'none') {
                proofImage.src = imgSrc;
                proofImage.style.display = 'block';
                } else {
                proofImage.style.display = 'none';
                }
            } else {
                console.log('URL gambar tidak valid');
            }
            });
        } else {
            console.log('Elemen badge atau proofImage tidak ditemukan');
        }
        });
    </script>
@endsection
