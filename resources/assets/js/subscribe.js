$(document).ready(function(){

	$('#subscribe').submit(function(e) {
e.preventDefault()
		var form = $(this)

		form.find('button').prop('disabled', true);

		Stripe.card.createToken({
		  number: $('.card-number').val(),
		  cvc: $('.card-cvc').val(),
		  exp_month: $('.card-expiry-month').val(),
		  exp_year: $('.card-expiry-year').val()
		},function(status, response) {
			if(response.error){

				form.find('.stripe-errors').text(response.error.message).addClass('aler alert-danger text-center')
				jQuery('#subscribe').find('button').prop('disabled', false)
			}else{
			console.log(response);
			form.append($("<input type='hidden' name='cc_token'>").val(response.id))

form.get(0).submit();
		}
		});
		
	})

})