@extends('welcome')

@section('content')
<div class="jumbotron" style="padding-top: 110px; padding-top: 110px; background: cadetblue; color: #fff;">
    <div class="container">
        <h1 class="display-4">Write Post</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
            <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
            <a href="{{route('all.post')}}" class="btn btn-primary">All Post</a>
            <br><hr>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                    <label for="">Title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Post Title">
                </div>
                <div class="form-group">
                    <label for="">Category:</label>
                    <select name="category_id" class="form-control">
                        <option>-- Select Category --</option>
                        @foreach ($category as $row)                        
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description:</label>
                    <textarea name="details" rows="6" class="form-control" placeholder="Post Description"></textarea>
                </div>            
            
                <input type="submit" value="Add Post" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection