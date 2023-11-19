@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Profile</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-8" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
        <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3">EDIT PROFILE</h5>
            <div class="card-body mx-2">
                <form action="/dashboard/profile/{{ $user->id }}" method="POST">
                    @method('put')
                    @csrf
                        <div class="row">
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" readonly>
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}" required>
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3 col-6">
                          <label for="divisions_id" class="form-label">Divisions</label>
                          <input type="hidden" class="form-control" id="divisions_id" name="divisions_id" value="{{ $user->divisions_id }}" readonly required>
                          <input type="text" class="form-control" value="{{ $user->division->name }}" readonly required>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="phonenumber" class="form-label">Phone Number</label>
                          <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}" required>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                      <button class="btn btn-dark py-2 mt-3" type="submit">Update Profile</button>
                    </div>
                </form>
                </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3">
                    <h5><i class="fa-solid fa-circle-info"></i> Informations</h5>
                </div>
                <div class="card-body">
                    <p>
                        You can change data such as<br>
                        1. Address<br>
                        2. Phone Number<br>
                        3. Email Address<br>

                        For <b>name</b> changes, please contact the admin.

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
<a href="/dashboard/profile" class="btn btn-outline-dark my-3">Back</a>

@endsection
