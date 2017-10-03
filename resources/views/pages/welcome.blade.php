@extends('layouts.app')

@section('content')
    <div class="hero">
        <div class="hero-content">
            <h1>Welcome to Our Premium Post</h1>
            <p>You're going to love it</p>
        </div>
    </div>

    <section class="container">
        <div class="section-header">
            <h2>Premium Posts</h2>
        </div>

        <p class="text-center lead">
            You now Have Access to Our premium Post
        </p>
        <div class="container">
            <div class="row">
            @foreach($posts as $post)
            
            <div class="col-sm-6 col-md-4 col-lg-3 col-xs-6">
                @include('partials.post-card',['post' =>$post] )
            </div>

            @endforeach
        </div>
    </div>
    </section>
@endsection
