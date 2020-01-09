@extends('welcome')

@section('content')
<div class="jumbotron" style="padding-top: 110px; padding-top: 110px; background: cadetblue; color: #fff;">
    <div class="container">
        <h1 class="display-4">All Categories</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    </div>
</div>
<div class="container">
<div class="row">
    <div class="col-md-8">

        <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
        <br><br>

        <table class="table table-responsive">
            <tr>
                <th>SL.</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
            @foreach ($category as $row)             
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->slug}}</td>
                <td>
                    <a href="{{URL::to('edit/category/'.$row->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{URL::to('view/category/'.$row->id)}}" class="btn btn-success btn-sm">View</a>
                    <a href="{{URL::to('delete/category/'.$row->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</div>
@endsection