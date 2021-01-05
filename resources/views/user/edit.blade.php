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
                            <a class="btn btn-primary" href="{{ url('user') }}"> Back</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>First Name:</strong>
                                    <input type="text" name="firstname" class="form-control" placeholder="firstname" value="{{ $user->firstname }}">
                                    @error('firstname')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="lastname" class="form-control" placeholder="lastname" value="{{ $user->lastname }}">
                                    @error('lastname')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>UserName:</strong>
                                    <input type="text" name="username" class="form-control" placeholder="UserName" value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>DNI:</strong>
                                    <input type="text" name="dninumber" class="form-control" placeholder="DNI" value="{{ $user->dninumber }}">
                                    @error('dninumber')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                </div>
                                @error('email')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>PhoneNumber:</strong>
                                    <input type="text" name="phone_number" class="form-control" placeholder="PhoneNumber" value="{{ $user->phone_number }}">
                                </div>
                                @error('phone_number')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Rol:</strong>
                                    <select class="form-control form-control-sm input-sm" name="role_id"
                                        id="role_id">
                                        @foreach ($rol as $key => $r)
                                        <option value="{{ $r->id }}" {{$user->role_id == $r->id ? 'selected' : ''}}>{{ $r->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Imagen:</strong>
                                    <input type="file" name="imagename" id="imagename">
                                </div>
                            </div> -->
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection