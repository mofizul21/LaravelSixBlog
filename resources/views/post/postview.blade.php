@extends('welcome')

@section('title')
{{$post->title}}
@endsection

@section('content')
<header class="masthead" style="background-image: url('{{URL::to($post->image)}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$post->title}}</h1>
            <h2 class="subheading">Under Category: {{$post->name}}</h2>
            <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on {{$post->created_at}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            {{$post->details}}
        </div>
      </div>
    </div>
  </article>
@endsection