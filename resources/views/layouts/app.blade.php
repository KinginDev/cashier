<!doctype html>
	<html class="no-js" lang=""
	    <head>
	        <meta charset="utf-8">
	        <meta http-equiv="x-ua-compatible" content="ie=edge">
	        <title></title>
	        <meta name="description" content="">
	        <meta name="viewport" content="width=device-width, initial-scale=1">
	        
	        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	        <link rel="apple-touch-icon" href="apple-touch-icon.png">
	
	      <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Raleway|Slabo+27px" rel="stylesheet">
	        <link rel="stylesheet" href="css/app.css"> 
	        <link href="">
	    </head>
	    <body>
	        
	
	        
	        {{-- Header --}}
	        <div id="site-header">
	        	@include('partials.header')
	        </div>
	        {{-- Main Site --}}
			<div id="main-site">
				<div class="">
					@yield('content')
				</div>
				
			</div>
	
	{{-- Footer --}}
	        @include('partials.footer')
	
	        <script src="js/app.js"></script>
	        <script src="js/main.js"></script>	       
	        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	       <script>
	  Stripe.setPublishableKey('{{env('STRIPE_KEY')}}');
	       </script>
	    </body>
	</html>	