@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-11">
                            <h2>Usuarios</h2>
                        </div>
                        <div class="col-lg-1">
                            <a href="{{ route('user.create')}}" class="btn btn-secondary float-right">New</a>
                        </div>
                    </div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success py-3">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        <table class="table table-bordered table-sm">
                            <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Phone Number</th>
                                <th>DNI</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($user as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->firstname }}</td>
                                <td>{{ $u->lastname }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->phone_number }}</td>
                                <td>{{ $u->dninumber }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->name }}</td>
                                <td>
                                    <form action="{{ route('user.destroy', $u->id) }}" method="POST">

                                        <a class="btn btn-info btn-sm" href="{{ route('user.show', $u->id) }}">Show</a>

                                        <a class="btn btn-primary btn-sm" href="{{ route('user.edit',$u->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                        {!! $user->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection