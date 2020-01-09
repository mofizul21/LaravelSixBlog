@extends('welcome')

@section('page_header')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('public/frontend/img/home-bg.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>ThemePackNet</h1>
                        <span class="subheading">A Blog Theme by <a href="https://themepack.net">ThemePackNet</a></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

        @foreach ($post as $row)
        <div class="post-preview">
            <a href="{{URL::to('view/post/'.$row->id)}}">
                <h2 class="post-title">{{$row->title}}</h2>
                <h3 class="post-subtitle">
                    {{Str::limit($row->details, 90)}}
                </h3>
            </a>
            <p class="post-meta">Posted under
                <a href="{{URL::to('view/category/'.$row->id)}}">{{$row->name}}</a>
                on {{ date('d-m-Y', strtotime($row->created_at)) }}</p>
        </div>
        <hr>
        @endforeach

        

        <!-- Pager -->
        <div class="clearfix float-right">
            {{$post->links()}}            
            {{-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> --}}
        </div>
    </div>
</div>
@endsection