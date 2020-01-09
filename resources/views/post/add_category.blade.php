@extends('welcome')

@section('content')
<div class="jumbotron" style="padding-top: 110px; padding-top: 110px; background: cadetblue; color: #fff;">
    <div class="container">
        <h1 class="display-4">Add Category</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
            <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
            <br>
            <hr>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{route('store.category')}}" method="POST">
                @csrf
                <div class="form-group ">
                    <label for="">Category:</label>
                    <input type="text" class="form-control" name="name" placeholder="Category Name">
                </div>

                <div class="form-group ">
                    <label for="">Slug:</label>
                    <input type="text" class="form-control" name="slug" placeholder="Slug Name">
                </div>

                <input type="submit" value="Add Category" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection