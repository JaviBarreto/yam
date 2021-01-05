@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-11">
                            <h2>Productos</h2>
                        </div>
                        <div class="col-lg-1">
                            <a class="btn btn-primary btn-sm" href="{{ url('product') }}"> Back </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th>First Name:</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Categoría</th>
                            <td>{{ $product->categories->name }}</td>
                        </tr>
                        <tr>
                            <th>Store</th>
                            <td>{{ $product->stores->name }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <th>Calories</th>
                            <td>{{ $product->calories }}</td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <td>{{ $product->remarks }}</td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td>{{ $product->weight }}</td>
                        </tr>
                        <tr>
                            <th>Compliment</th>
                            <td>{{ $product->isonlycompliment == 1 ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="text-center py-3">
                    @if(!isset($product->imagename))
                    <img style="width:15em;height:15em;" src="{{url('storage/img_product/default.png')}}"
                        class="avatar" alt="avatar">
                    @else
                    <img style="width:15em;height:15em;" src="{{url('storage/'.$product->imagename)}}"
                        class="avatar">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection