@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Divisions</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row mb-3">
        <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="fa-solid fa-users"></i> Edit Divisions</h5>
            <div class="card-body mx-2">
                <form action="/dashboard/divisions/{{ $division->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Division Name</label>
                        <input type="name" class="form-control" id="name" name="name" placeholder="CEO" value="{{ old('name', $division->name) }}" required>
                    </div>
                    <button class="btn btn-dark" type="submit">Update Division</button>
                    <a href="/dashboard/divisions" class="btn btn-outline-dark my-3">Cancel</a>
                </form>
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

@endsection
