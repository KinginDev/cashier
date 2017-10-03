	@extends('layouts.app')




@section('content')
<div class="row" >
	<div class="hero">
		<div class="hero-content">
			<h1 class="h1">Daily Dose of Cute Animals</h1>
			<h2>Only $10/month</h2>
			<div class="cta">
				<p>We promise You won't regret it!!</p>
				<a href="/Subscribe" class="btn btn-danger btn-lg">Subscribe</a>
			</div>
		</div>
	</div>

	<section>
		<div class="section-header">
			<div class="container">
				<h2>Latest Animals</h2>
			</div>
			
		</div>
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
</div>
	
</div>

@stop