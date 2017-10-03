@extends('layouts.app')


@section('content')

	<section class="container">
		
		<div style="margin: 20px;"></div>
			{{--Account Info--}}
			<div class="card card-padding card-margin">

			<div class="section-header">
				<h2>Account Info</h2>
			</div>
				

			
		</div>

		@if($user->subscribed('main'))
		
		{{--Success Message--}}

		

		{{--Subscription Info --}}
		<div class="card card-padding card-margin" id="subs">

			<div class="section-header">
				<h2>Your Subscription</h2>
			</div>
									{{--Check if the user is on his grace period--}}
					@if($user->subscription('main')->onGracePeriod())
						<div class="alert alert-danger text-center">
						You have canceled your account. <br>
						 You have access to premium content till:
						 <strong>
						 	{{$user->subscription('main')->ends_at->toFormattedDateString()}}
						 </strong> 
						</div>
					@endif
			<div class="row">
				<div class="col-sm-6">
					<div class="well text-center">
						<strong>Current Plan:</strong> {{ucfirst($user->subscription('main')->stripe_plan)}}
					</div>

			@if (session('update_sub'))
				<div class="alert alert-success">
					{{session('update_sub')}}
				</div>

			@endif
				</div>
				<div class="col-sm-6" style="margin: 0;">
					{{--Update subscription form--}}
					<h4 class="text-center">Update Subscription</h4>

					<form action="{{route('updateSub')}}" method="POST">
						
						{{csrf_field()}}
						<div class="form-group">
							<select name="plan" id="" class="form-control">
								<option value="bronze"
								 {{ ($user->onPlan( 'bronze')) ? 'selected' : ' '}}>
								Bronze ($5/Mon)
							</option>
								<option value="silver"
								 {{ ($user->onPlan('silver')) ? 'selected' : ' '}}>
								Silver ($10/Mon)
							</option>
								<option value="gold"
								 {{ ($user->onPlan('gold')) ? 'selected' : ' '}}>
								Gold ($15/Mon)
							</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary btn-lg btn-block">
							{{$user->subscription('main')->onGracePeriod() ? 'Reactivate' : 'Update Plan'}}
						</button>
					</form>

				</div>
			</div>

		</div>

		
		{{--Credit Card Info--}}

			<div class="card card-padding card-margin">
				<div class="section-header">
					<h2>Update Card</h2>
				</div>
				<form action="{{ route('cardUpdate') }}" method="POST" id="subscribe">
					{{csrf_field()}}
					<div class="form-group row">
				{{-- cc Number --}}
			<div class="col-xs-8">
			<label for="">Credit Card Number</label>
			<input type="text" class="form-control card-number" placeholder="XXXX XXXX XXXX {{$user->card_last_four}}" data-stripe="number">
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
				@elseif(session('update_card'))
					
					<div class="alert alert-info" style="padding: 20px;">
						{{session('update_card')}}
					</div>

				@endif
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">
					Update Card
				</button>
				</div>
				
				</form>
			</div>

			{{--Billing History --}}

				<div class="card card-padding card-margin">
			<div class="section-header">
				<h2>Billing Histroy</h2>
			</div>
			
			@if(count($invoices) > 0)
				
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover ">
				<tbody>
					@foreach ($invoices as $invoice)

				<tr>
						<td>{{$invoice->date()->toFormattedDateString()}}</td>
						<td>{{$invoice->total()}}</td>
						<td class="col-xs-2"><a href="{{ route('download.invoice',$invoice->id) }}" class="btn btn-default btn-sm">Download Invoice</a></td>
					</tr>
					@endforeach
				</tbody>
				
			</table>

				</div>
			
			@else

			<div class="jumbotron text-center">
				<p>No billing History</p>
			</div>
			@endif
	{{-- Delete Subscription--}}
			<form action="{{ route('subDelete') }}" method="POST" class="text-right">
				{!!csrf_field()!!}

				<input type="hidden" name="_method" value="DELETE">
				<button type="submit" class="btn btn-link ">
					{{$user->subscription('main')->onGracePeriod() ? '' : 'Cancel Subscription'}}
					

				</button>
			</form>
		</div>

		
		
		@else
		<div class="jumbotron text-center">
			<h2>You don't have a subscription</h2>
				<p>Subscribe To View Our Premium Posts</p>
				<a href="/subscribe" class="btn btn-danger btn-lg">
					Subscribe Now
				</a>
			</div> 
			@endif
	</section>




@stop