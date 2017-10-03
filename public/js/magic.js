$(document).ready(function(){

	//target theform on submission
	//create a token

	$('#subscribe-form').submit(function(e){
		
		var form = $(this);

		//disable the form button
		form.find('button').prop('disabled', true);

		//stripe

	stripe.createToken(card).then(function(result) {
	console.log()

	//append the token to the form

	form.append($("<input type='hidden' name='cc_token'>").val(response.id))
	
	//submit the form
	//form.get(0).submit();

	});
	e.preventDefault();
	})
});