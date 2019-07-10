(function ($) {
    'use strict';
    console.log("main script online");
	
    var $window = $(window);


    // :: Show about modals on about image hover
    $(".abx").on('click', function (e) {
		
        e.preventDefault();
		let abx = $(this).attr("data-abx");		
		let abx_id = "#abx-" + abx;
		let abxx = $(abx_id);
		
		//Fill the modal with bio
		console.log("abx id: " + abx_id);
		console.log(abxx.attr('data-title'));
		$('#aboutModalTitle').html(abxx.attr('data-title'));
		$('#aboutModalDesc').html(abxx.attr('data-desc'));
		
		//SHow the modal
		$('#aboutModal').modal("show");
    });
	
	$("#pay-card").click(function(e){
	e.preventDefault();
	 mc['comment'] = $('#comment').val();
	 mc['email'] = $('#em').val();
	 mc['fname'] = $('#fname').val();
	 mc['lname'] = $('#lname').val();
	 mc['address'] = $('#address').val();
	 mc['city'] = $('#city').val();
	 mc['state'] = $('#state').val();
	 mc['phone'] = $('#phone').val();
	 
	 $('#pem').val($('#em').val());
	
	$('#nd').val(JSON.stringify(mc));
	
	setPaymentAction("card");
});



})(jQuery);

function setPaymentAction(type){
	let paymentURL = "";
	
	if(type == "cod"){
		paymentURL = $("#cod-action").val();  
   }
   else if(type == "card"){
		paymentURL = $("#card-action").val();  
   }
   
   //alert(paymentURL);

   $('#checkout-form').attr('action',paymentURL);
   $('#checkout-form').submit();
}