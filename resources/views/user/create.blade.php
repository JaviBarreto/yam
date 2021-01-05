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
                    <form action="{{ route('user.store') }}" method="POST" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>FirstName:</strong>
                                    <input type="text" name="firstname" class="form-control" placeholder="FirstName" value={{old('firstname')}}>
                                    @error('firstname')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>LastName:</strong>
                                    <input type="text" name="lastname" class="form-control" placeholder="LastName" value={{old('lastname')}}>
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
                                    <input type="text" name="username" class="form-control" placeholder="UserName" value={{old('username')}}>
                                    @error('username')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>DNI:</strong>
                                    <input type="text" name="dninumber" class="form-control" placeholder="DNI" value={{old('dninumber')}}>
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
                                    <input type="text" name="email" class="form-control" placeholder="Email"  value={{old('email')}}>
                                    @error('email')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>PhoneNumber:</strong>
                                    <input type="text" name="phone_number" class="form-control" placeholder="PhoneNumber" value={{old('phone_number')}}>
                                    @error('phone_number')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    <input type="password" name="password" class="form-control" placeholder="Password" value={{old('password')}}>
                                    @error('password')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Confirma Password:</strong>
                                    <input type="password" name="cpassword" class="form-control" placeholder=" Confirma Password">
                                    @error('cpassword')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Rol:</strong>
                                    <select class="form-control form-control-sm input-sm" name="role_id"
                                        id="rol_id">
                                        <option value="">- - - - - </option>
                                        @foreach ($rol as $key => $r)
                                            <option value="{{ $r->id }}" {{ old('role_id')==$r->id ? 'selected' : '' }}>{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('role_id'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('role_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
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