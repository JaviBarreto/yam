@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-11">
                            <h2>Usuarios</h2>
                        </div>
                        <div class="col-lg-1">
                            <a class="btn btn-primary btn-sm" href="{{ url('user') }}"> Back </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th>First Name:</th>
                            <td>{{ $user->firstname }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ $user->lastname }}</td>
                        </tr>
                        <tr>
                            <th>User Name</th>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $user->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>DNI</th>
                            <td>{{ $user->dninumber }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Rol</th>
                            <td>{{ $user->role_id }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection