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
                            <a href="{{ route('product.create')}}" class="btn btn-secondary float-right">New</a>
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
                            <th>Category Name</th>
                            <th>Store Name</th>
                            <th>Price</th>
                            <th>Calories</th>
                            <th>Remarks</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($product as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{$p->categories->name}}</td>
                            <td>{{$p->stores->name}}</td>
                            <td>{{$p->price}}</td>
                            <td>{{$p->calories}}</td>
                            <td>{{$p->remarks}}</td>
                            <td>{{$p->status === 1 ? 'Active' : 'Inactive' }}</span></td>
                            <td>
                                <form action="{{ route('product.destroy', $p->id) }}" method="POST">

                                    <a class="btn btn-info btn-sm" href="{{ route('product.show', $p->id) }}">Show</a>

                                    <a class="btn btn-primary btn-sm" href="{{ route('product.edit',$p->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $product->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection