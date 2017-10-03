@extends('layouts.app')



@section('content')


<div class="hero">
	<div class="hero-content">
		<h1>You are Joining</h1>
		<h2>Happy For You!!</h2>
	</div>
</div>


<section class="container">
	<div class="card card-padding">
{{-- User Info Will Show If Nit logged in --}}
 	<form action="/subscribe" id="subscribe" method="POST" data-stripe-publishable-key="pk_test_Sk2ZonOicHWGe7FGvM6zmfIT" > 
 		{!!csrf_field()!!}
	{{-- User Info --}}
	@if(Auth::guest())
		<div class="section-header">
			<h2>User Info</h2>
			
		</div>
		
			<div class="form-group">
				<label for="">Name</label>
			<input type="text" class="form-control" name="name">
			</div>
	
			<div class="form-group">
				<label for="">Email</label>
			<input type="email" class="form-control" name="email">
			</div>

			<div class="form-group">
				<label for="">Password</label>
			<input type="password" class="form-control" name="password">
			</div>
			@endif
		
	{{-- Subscription Info --}}
		<div class="section-header">
			<h2>Subscription Info</h2>
		</div>
		<div class="from-group">
			<div class="row">
				<div class="col-xs-4">
					<div class="subscription-option">
						<input type="radio" id="plan-bronze" name="plan" value="bronze" checked>
						<label for="plan-bronze">
							<span class="plan-price">
								$5 <small>/mon</small>
							</span>
							<span class="plan-name">Bronze</span>
						</label>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="subscription-option">
						<input type="radio" id="plan-silver" name="plan" value="silver">
						<label for="plan-silver">
							<span class="plan-price">
								$10 <small>/mon</small>
							</span>
							<span class="plan-name">Silver</span>
						</label>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="subscription-option">
						<input type="radio" id="plan-gold" name="plan" value="gold">
						<label for="plan-gold">
							<span class="plan-price">
								$15 <small>/mon</small>
							</span>
							<span  class="plan-name">Gold</span>
						</label>
					</div>
					
				</div>
			</div>
		</div>
	{{-- Credt ctad info --}}
		<div class="section-header">
			<h2>Credit Card Info</h2>
		</div>
	
	
		<div class="form-group row">
				{{-- cc Number --}}
			<div class="col-xs-8">
			<label for="">Credit Card Number</label>
			<input type="text" class="form-control card-number" placeholder="XXXX XXXx XXXX XXXX" data-stripe="number">
			</div>
	{{-- Cvc --}}
			<div class="col-xs-4">
				<label for="">CVC</label>
				<input type="text" class="form-control card-cvc" placeholder="123" data-stripe="cvc"  maxlength="3">
			</div>
			
		</div>
		<div class="form-group row">
					{{-- Exp Month --}}
				<div class="col-xs-3">
					<label for="">Expiration Month</label>
					<input type="text" class="form-control card-expiry-month" placeholder="MM" data-stripe="exp_month">
					</div>

				{{-- Exp Year --}}
				<div class="col-xs-3">
					<label for="">Expiration Year</label>
					<input type="text" class="form-control card-expiry-year" placeholder="YYYY" data-stripe="exp_year">
				</div>
				</div>
				<div class="form-group">
					<div class="stripe-errors text-danger" style="padding: 20px;">	
					</div>
					@if(count($errors) > 0) 
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</div>
				@endif
				</div>
				
	


		<div class="form-group text-center">
			<button type="submit" class="btn btn-lg btn-success btn-block">Join</button>
		</div>

		</form>

	</div>
	
</section>

@stop