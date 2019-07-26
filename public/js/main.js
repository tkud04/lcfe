(function ($) {
    'use strict';
    console.log("main script online");
    
	let x = getCookie('lcfe_gdpr');
    if (x) {
      $('#cookieConsent').hide();
   }

    var $window = $(window);
    
	$("#register-online-1").hide();

    // :: Show about modals on about image hover
    $("#register-pay-btn").on('click', function (e) {
		
        e.preventDefault();
		$("#register-online").hide();
		$("#register-online-1").show();
	});
	
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
	let em = $('#em').val();
	let fname = $('#fname').val();
	let lname = $('#lname').val();
	let address = $('#address').val();
	let city = $('#city').val();
	let state = $('#state').val();
	let phone = $('#phone').val();
	
	if(em === "" || fname === "" || lname === "" || address === "" || city === "" || state === "" || phone === ""){
		if(em === "") alert("Your email address is required");
		if(fname === "") alert("Your first name is required");
		if(lname === "") alert("Your last name is required");
		if(address === "") alert("Your residential address is required");
		if(city === "") alert("Your city of residence is required");
		if(state === "") alert("Your state of residence is required");
		if(phone === "") alert("Your phone number is required");
    }
	else{
	 mc['comment'] = $('#comment').val();
	 mc['email'] = em;
	 mc['fname'] = fname;
	 mc['lname'] = lname;
	 mc['address'] = address;
	 mc['city'] = city;
	 mc['state'] = state;
	 mc['phone'] = phone;
	 
	 $('#pem').val(em);
	
	$('#nd').val(JSON.stringify(mc));
	
	setPaymentAction("card");
	}
});


$('#register-download-btn').click(function(e) {
    e.preventDefault(); 
	
    let data_g = $(this).attr('data-g');
    $(this).attr({
	download: "account.pdf",
	href: data_g
	});
	
	$(this).click();
});

$("#farmer-card").click(function(e){
	e.preventDefault();
	let em = $('#em').val();
	let fname = $('#fname').val();
	let lname = $('#lname').val();
	let address = $('#address').val();
	let city = $('#city').val();
	let state = $('#state').val();
	let phone = $('#phone').val();
	
	if(em === "" || fname === "" || lname === "" || address === "" || city === "" || state === "" || phone === ""){
		if(em === "") alert("Your email address is required");
		if(fname === "") alert("Your first name is required");
		if(lname === "") alert("Your last name is required");
		if(address === "") alert("Your residential address is required");
		if(city === "") alert("Your city of residence is required");
		if(state === "") alert("Your state of residence is required");
		if(phone === "") alert("Your phone number is required");
    }
	else{ 
	 $('#farmer-register-form').submit();
	}
});


})(jQuery);


/********** Helper functions **********/
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}

function setPaymentAction(type){
	let paymentURL = "";
	
	if(type == "cod"){
		paymentURL = $("#cod-action").val();  
   }
   else if(type == "card"){
		paymentURL = $("#card-action").val();  
   }
   
   //alert(paymentURL);

   $('#register-form').attr('action',paymentURL);
   $('#register-form').submit();
}