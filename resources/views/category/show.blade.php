@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-11">
                            <h2>Categorías</h2>
                        </div>
                        <div class="col-lg-1">
                            <a class="btn btn-primary btn-sm" href="{{ url('category') }}"> Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th>First Name:</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="text-center py-3">
                    @if(!isset($category->imagename))
                    <img style="width:15em;height:15em;" src="{{url('storage/img_category/default.png')}}"
                        class="avatar" alt="avatar">
                    @else
                    <img style="width:15em;height:15em;" src="{{url('storage/'.$category->imagename)}}"
                        class="avatar">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection