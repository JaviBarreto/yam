@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-11">
                            <h2>Productos</h2>
                        </div>
                        <div class="col-lg-1">
                            <a class="btn btn-primary" href="{{ url('product') }}"> Back</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
                                </div>
                                @error('name')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Category:</strong>
                                    <select class="form-control form-control-sm input-sm" name="category_id"
                                        id="category_id">
                                        @foreach ($category as $key => $c)
                                        <option value="{{ $c->id }}" {{$product->category_id == $c->id ? 'selected' : ''}}>{{ $c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Store:</strong>
                                    <select class="form-control form-control-sm input-sm" name="store_id" id="store_id">
                                        @foreach ($store as $key => $s)
                                        <option value="{{ $s->id }}" {{$product->store_id == $s->id ? 'selected' : ''}}>{{ $s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    <input type="number" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
                                </div>
                                @error('price')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Calories:</strong>
                                    <input type="number" name="calories" class="form-control" placeholder="Calories" value="{{ $product->calories }}">
                                </div>
                                @error('calories')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Remarks: </strong>
                                    <input type="text" name="remarks" class="form-control" placeholder="Remarks" value="{{ $product->remarks }}">
                                </div>
                                @error('remarks')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Weight: </strong>
                                    <input type="number" name="weight" class="form-control" placeholder="Weight" value="{{ $product->weight }}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Is Complement:</strong>
                                    <select class="form-control form-control-sm input-sm" name="isonlycompliment"
                                        id="isonlycompliment">
                                        <option value="1" {{ $product->isonlycompliment == 1 ? 'selected' : ''}}>Is Complement</option>
                                        <option value="0" {{ $product->isonlycompliment == 0 ? 'selected' : ''}}>Not Complement</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Status:</strong>
                                    <select class="form-control form-control-sm input-sm" name="status" id="status">
                                        <option value="1" {{ $product->status == 1 ? 'selected' : ''}}>Activo</option>
                                        <option value="0" {{ $product->status == 0 ? 'selected' : ''}}>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Imagen:</strong>
                                    <input type="file" name="imagename" id="imagename">
                                </div>
                                @error('imagename')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                @enderror
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