@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Employees</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col">
        <div class="card mb-3">
            <h5 class="card-header p-3"><i class="fa-solid fa-user"></i> Employees</h5>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">DIVISION</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">PHONE NUMBER</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->division->name }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phonenumber }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="/dashboard/employees/{{ $user->id }}/edit" class="badge bg-dark border-0"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="/dashboard/employees/{{ $user->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-dark border-0" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
    </div>
    </div>

@endsection
