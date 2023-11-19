@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Reports</h1>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h4>{{ date('F Y')}}</h4>
    </div>
</div>

@if (auth()->user()->is_admin == '1')
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
        <th scope="col">DIVISION</th>
        <th scope="col">DATE</th>
        <th scope="col">IN</th>
        <th scope="col">OUT</th>
        <th scope="col">STATUS</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($absensis as $absensi)
        <tr>
            <td>{{ $absensi->id }}</td>
            <td>{{ $absensi->name }}</td>
            <td>{{ $absensi->division->name }}</td>
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
        <th scope="col">NAME</th>
        <th scope="col">DIVISION</th>
        <th scope="col">DATE</th>
        <th scope="col">IN</th>
        <th scope="col">OUT</th>
        <th scope="col">STATUS</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($absensi_by_name as $absensi)
        <tr>
            <td>{{ $absensi->id }}</td>
            <td>{{ $absensi->name }}</td>
            <td>{{ $absensi->division->name }}</td>
            <td>{{ $absensi->date }}</td>
            <td>{{ $absensi->in }}</td>
            <td>{{ $absensi->out }}</td>
            <td>{{ $absensi->status }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endif


@endsection
