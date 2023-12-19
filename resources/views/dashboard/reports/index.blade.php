@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan - {{ date('F Y')}}</h1>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <button class="btn btn-dark" onclick="printReport()"><i class="fa-solid fa-file-arrow-down"></i> Cetak Laporan</button>
    </div>
</div>

@if (auth()->user()->is_admin == '1')
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAMA</th>
        <th scope="col">DIVISI</th>
        <th scope="col">TANGGAL</th>
        <th scope="col">MASUK</th>
        <th scope="col">KELUAR</th>
        <th scope="col">STATUS</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($absensis as $absensi)
        <tr>
            <td>{{ $absensi->id }}</td>
            <td>{{ $absensi->name }}</td>
            <td>
              @if ($absensi->division)
              {{ $absensi->division->name }}
              @else
              <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> DIVISI TIDAK DITEMUKAN!</p>
              @endif
            </td>
            <td>{{ $absensi->date }}</td>
            <td>{{ $absensi->in }}</td>
            <td>{{ $absensi->out }}</td>
            <td>{{ $absensi->status }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @else
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAMA</th>
        <th scope="col">DIVISI</th>
        <th scope="col">TANGGAL</th>
        <th scope="col">MASUK</th>
        <th scope="col">KELUAR</th>
        <th scope="col">STATUS</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($absensi_by_name as $absensi)
        <tr>
            <td>{{ $absensi->id }}</td>
            <td>{{ $absensi->name }}</td>
            <td>
                @if ($absensi->division)
                {{ $absensi->division->name }}
                @else
                <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> DIVISI TIDAK DITEMUKAN!</p>
                @endif
            </td>
            <td>{{ $absensi->date }}</td>
            <td>{{ $absensi->in }}</td>
            <td>{{ $absensi->out }}</td>
            <td>{{ $absensi->status }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endif

    <script>
function printReport() {
    var date = new Date();
    var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    var currentMonth = monthNames[date.getMonth()];

    var companyName = '<div style="float: left; font-size: 20px; font-weight: bold;">Kirin ★ Performance</div>';
    var separator = '<hr style="border: 2px solid black; clear: both;" />';
    var title = '<div style="font-size: 20px; font-weight: bold; text-align: right;">Laporan ' + currentMonth + '</div>';

    var printContents = companyName + title + separator + document.querySelector('.table').outerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

    </script>

@endsection
