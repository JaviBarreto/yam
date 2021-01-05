@extends('layouts.app')

@section('content')



<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-11">
                            <h2>Categorías</h2>
                        </div>
                        <div class="col-lg-1">
                            <a href="{{ route('category.create')}}" class="btn btn-secondary float-right">New</a>
                        </div>
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
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($category as $c)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $c->name }}</td>
                            <td>
                                <form action="{{ route('category.destroy', $c->id) }}" method="POST">

                                    <a class="btn btn-info btn-sm" href="{{ route('category.show', $c->id) }}">Show</a>

                                    <a class="btn btn-primary btn-sm" href="{{ route('category.edit',$c->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {!! $category->links() !!}

                </div>
            </div>
        </div>
    </div>
</div>


@endsection