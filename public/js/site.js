// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.
$('.shop-categories-linkk').click(function(e){
	e.preventDefault();
	let c = $(this).attr('data-cat');
	console.log("Category: " + c);
});

$("#pay-cod").click(function(e){
	e.preventDefault();
	setPaymentAction("cod");
});

$("#pay-card").click(function(e){
	e.preventDefault();
	 mc['comment'] = $('#comment').val();
	if($('#customCheck3').is(':checked')) mc['ssa'] = "on";
	$('#nd').val(JSON.stringify(mc));
	
	setPaymentAction("card");
});

$("#deposit-card").click(function(e){
	e.preventDefault();
	
	 $('#meta-amount').val($('#amount').val() * 100);
	$('#nd').val(JSON.stringify(mc));
	setPaymentAction("card");
});

let x = getCookie('kloudtransact_gdpr');
if (x) {
    $('#cookieConsent').hide();
}





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
   $('#checkout-form').attr('action',paymentURL);
   $('#checkout-form').submit();
}