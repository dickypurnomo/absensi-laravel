@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Divisions</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row mb-3">
        <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="fa-solid fa-users"></i> Add Divisions</h5>
            <div class="card-body mx-2">
                <form action="/dashboard/divisions" method="POST">
                    @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Division Name</label>
                                <input type="name" class="form-control" id="name" name="name" placeholder="CEO" autofocus required>
                            </div>
                        <button class="btn btn-dark py-2 mt-3" type="submit">Add Division</button>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card mb-3">
                    <h5 class="card-header p-3"><i class="fa-solid fa-circle-info"></i> Informations</h5>
                    <div class="card-body">
                      <p>
                        The addition of divisions must be in accordance with the required divisions. <br>
                        If there is an error in the division, please update the division data.
                      </p>
                    </div>
                  </div>
            </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card mb-3">
                <h5 class="card-header p-3"><i class="fa-solid fa-circle-info"></i> Division</h5>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $division)
                            <tr>
                                <th scope="row">{{ $division->id }}</th>
                                <td>{{ $division->name }}</td>
                                <td><a href="/dashboard/divisions/{{ $division->id }}/edit" class="badge bg-dark border-0"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="" class="badge bg-dark border-0"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
