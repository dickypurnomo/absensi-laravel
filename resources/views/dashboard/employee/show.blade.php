@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Employees</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-8" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
        <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="fa-solid fa-user-plus"></i> Add Employees</h5>
            <div class="card-body mx-2">
                <form action="/dashboard/employees" method="POST">
                    @csrf
                        <div class="row">
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="John Martin" autofocus required>
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control" id="address" name="address" placeholder="123 Road Race" required>
                        </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="divisions_id" class="form-label">Division</label>
                                <select class="form-select" id="divisions_id" name="divisions_id" required>
                                    @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                        <div class="mb-3">
                          <label for="phonenumber" class="form-label">Phone Number</label>
                          <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="+62123123123" required>
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3 col-6">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="johnmartin@mail.com" required>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <button class="btn btn-dark py-2 mt-3" type="submit">Add Employee</button>
                </form>
                </div>
                </div>
          </div>

          <div class="col-6">
            <div class="card mb-3">
                <h5 class="card-header p-3"><i class="fa-solid fa-circle-info"></i> Informations</h5>
                <div class="card-body">
                  <p>
                    Employee addition can only be done by the admin. <br>

                    For temporary passwords, you can enter "password"

                    <div class="mb-3">
                        <b>Example data :</b><br>
                        Gaetano Dickens | Financial<br>
                        carlos.prohaska@example.com<br>
                        1-606-295-5725<br>
                        502 Zack Spur Apt. 644 Lake Drewberg, MI 33972-3678
                    </div>
                  </p>
                </div>
              </div>
        </div>
    </div>

@endsection
