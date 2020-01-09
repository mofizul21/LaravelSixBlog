@extends('welcome')

@section('title')
    Edit - {{$post->title}}
@endsection

@section('content')
<div class="jumbotron" style="padding-top: 110px; padding-top: 110px; background: cadetblue; color: #fff;">
    <div class="container">
        <h1 class="display-4">Update: {{$post->title}}</h1>
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

        <form action="{{url('update/post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label for="">Title:</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="">Category:</label>
                <select name="category_id" class="form-control">
                    @foreach ($category as $row)
                        <option value="{{$row->id}}" @if ($row->id == $post->category_id) selected @endif>{{$row->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Select New Image:</label>
                <input type="file" name="image" class="form-control">
                <br>
                <img src="{{URL::to($post->image)}}" height="100" alt="">
                <input type="hidden" name="old_image" id="old_photo" value="{{$post->image}}">
            </div>
            <div class="form-group">
                <label for="">Description:</label>
                <textarea name="details" rows="6" class="form-control">{{$post->details}}</textarea>
            </div>            
        
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
</div>
</div>
@endsection