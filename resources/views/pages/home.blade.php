	@extends('layouts.app')




@section('content')
<div class="row" >
	<div class="hero">
		<div class="hero-content">
			<h1 class="h1">Daily Dose of Cute Animals</h1>
			<h2>@if(Auth::check())
				{{($user->subscription('main') and $user->subscription('main')->onGracePeriod()) ? '' : 'Only N10/Mon'}}
				@else
				''
				@endif
			</h2>
			<div class="cta">
				<p>We promise You won't regret it!!</p>
				@if(Auth::check())
					@if($user->subscribed('main') and !($user->subscription('main')->onGracePeriod()))
						<a href="#content" class="btn btn-danger btn-lg">
							View Posts Now
						</a>
					@elseif($user->subscribed('main')){{--else if  --}}
						@if ($user->subscription('main')->onGracePeriod())
							<a href="/account#subs" class="btn btn-danger btn-lg">
								Reactivate Subscription
							</a>
						@endif
						{{--endif $user->subscribed('main')->onGracePeriod()--}}
						
					@elseif(Auth::check() and !$user->subscribed('main')) {{--else if $user->subscribed('main)--}}
					<a href="/subscribe" class="btn btn-danger btn-lg">
						Subscribe
					</a>
					@endif{{-- endif $user->subscribed('main) .........--}}

			@else{{-- else Auth::check--}}
			<a href="/login" class="btn btn-danger btn-lg">
				Join Now
			</a>
			@endif {{-- endif Auth::check--}}
				
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
	<div class="row" id="content">
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