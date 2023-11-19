@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Profile</h1>
</div>
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="fa-solid fa-user"></i> Personal Information</h5>
            <div class="card-body">
                @foreach ($users as $user)
                @if ($loop->first)
                  <h1 class="fs-4 mb-0">{{ $user->name }}</h1>
                    <p class="fs-5 my-0">
                    {{ $user->division->name }}<br>
                    {{ $user->email }}<br>
                    {{ $user->phonenumber }}<br>
                    {{ $user->address }}
                    </p>
                @endif
                @endforeach
            </div>
          </div>
          <a href="/dashboard/profile/{{ $user->id }}/edit" class="btn btn-dark mt-3">Edit Profile</a>
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
                    4. Password <br>

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
@endsection
