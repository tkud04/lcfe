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



})(jQuery);