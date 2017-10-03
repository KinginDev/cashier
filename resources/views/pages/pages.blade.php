@extends('layouts.app')

@section('content')

	<div class="container">
		<article class="card post-single">
			
		@if($post->premium and !(Auth::user() and Auth::user()->subscribed('main')))
		<div class="jumbotron text-center">
			<h2>Subscribe to gain Access</h2>
			<p>This post is reserved for our paid subscribers. Join to gain access</p>
			
			<a href="/subscribe">
				<button class="btn btn-danger btn-lg">Subscribe Now</button>
			</a>

		</div>


		@else
			{{-- Image --}}
			<div class="img-container" style="background: url({{$post->images}}"></div>
			{{-- Card Content --}}
			<div class="card-content">
				{{--title --}}
				<header class="post-header">
					<h1>{{$post->title}}</h1>
							{{-- byline --}}
					<div class="byeline">
						<span>Author:  </span>{{$post->author->name}}
					</div>
				</header>
			
				{{-- TODO --}}
				{{-- content --}}
				{!!$post->content!!}
			</div>

			@endif
			
						

	</div>

@stop