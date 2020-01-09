@extends('welcome')

@section('content')
<div class="jumbotron" style="padding-top: 110px; padding-top: 110px; background: cadetblue; color: #fff;">
    <div class="container">
        <h1 class="display-4">All Posts</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
            <a href="{{route('write.post')}}" class="btn btn-info">Write Post</a>
            <br><br>

            <table class="table table-responsive">
                <tr>
                    <th>SL.</th>
                    <th style="width: 5%">Category</th>
                    <th style="width: 35%">Title</th>
                    <th style="width: 7%">Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($post as $row)             
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->title}}</td>
                    <td>
                        @if ($row->image) <img src="{{URL::to($row->image)}}" height="70" alt="Post Image"> @endif
                    </td>
                    <td>
                        <a href="{{URL::to('edit/post/'.$row->id)}}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{URL::to('view/post/'.$row->id)}}" class="btn btn-success btn-sm">View</a>
                        <a href="{{URL::to('delete/post/'.$row->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection