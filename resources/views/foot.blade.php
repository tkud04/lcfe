


	<!-- js -->

	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 

	<!-- //js -->	

	

	<script src="js/wow.js"></script>
              <script>
              new WOW().init();
              </script>
	
	<!-- Stocks display js code -->
			<script type="text/javascript">
			$(function () {
				$(".demo1").bootstrapNews({
					newsPerPage: 1,
					autoplay: true,
					pauseOnHover:true,
					direction: 'up',
					newsTickerInterval: 3000,
					onToDo: function () {
						//console.log(this);
					}
				});
				
				$(".demo2").bootstrapNews({
					newsPerPage: 3,
					autoplay: true,
					pauseOnHover: true,
					navigation: false,
					direction: 'up',
					newsTickerInterval: 2500,
					onToDo: function () {
						//console.log(this);
					}
				});
			});
		</script>
		<script src="js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.marquee.min.js"></script>
	
	<!-- Stats-Number-Scroller-Animation-JavaScript -->

		<script src="js/waypoints.min.js"></script> 

		<script src="js/counterup.min.js"></script> 

		<script>

			jQuery(document).ready(function( $ ) {

				$('.counter').counterUp({

					delay: 100,

					time: 1000

				});

			});

		</script>

	<!-- //Stats-Number-Scroller-Animation-JavaScript -->

	<!-- Main script -->

		<script src="js/main.js"></script> 

	<!-- Banner Responsiveslides -->

	<script src="js/responsiveslides.min.js"></script>

	<script>

		// You can also use "$(window).load(function() {"

		$(function () {

			// Slideshow 4

			$("#slider3").responsiveSlides({

				auto: true,

				pager: true,

				nav: false,

				speed: 500,

				namespace: "callbacks",

				before: function () {

					$('.events').append("<li>before event fired.</li>");

				},

				after: function () {

					$('.events').append("<li>after event fired.</li>");

				}

			});



		});

	</script>

	<!-- // Banner Responsiveslides -->



	<!-- start-smoth-scrolling -->

	<script src="js/SmoothScroll.min.js"></script>

	<script type="text/javascript" src="js/move-top.js"></script>

	<script type="text/javascript" src="js/easing.js"></script>

	<script type="text/javascript">

		jQuery(document).ready(function($) {

			$(".scroll").click(function(event){		

				event.preventDefault();

				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);

			});

		});

	</script>

	<!-- here stars scrolling icon -->

	<script type="text/javascript">

		$(document).ready(function() {

			/*

				var defaults = {

				containerID: 'toTop', // fading element id

				containerHoverID: 'toTopHover', // fading element hover id

				scrollSpeed: 1200,

				easingType: 'linear' 

				};

			*/

								

			$().UItoTop({ easingType: 'easeOutQuart' });

								

			});

	</script>

	<!-- //here ends scrolling icon -->

	<!-- start-smoth-scrolling -->



	<!-- FlexSlider-JavaScript -->

	<script defer src="js/jquery.flexslider.js"></script>

	<script type="text/javascript">

		$(function(){

			//SyntaxHighlighter.all();

				});

				$(window).load(function(){

				$('.flexslider').flexslider({

					animation: "slide",

					start: function(slider){

						$('body').removeClass('loading');

					}

			});

		});

	</script>

	<!-- //FlexSlider-JavaScript -->
    
    <script src="js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
    
    <script type="text/javascript">
			$(function () {
				$(".demo1").bootstrapNews({
					newsPerPage: 1,
					autoplay: true,
					pauseOnHover:true,
					direction: 'up',
					newsTickerInterval: 3000,
					onToDo: function () {
						//console.log(this);
					}
				});
				
				$(".demo2").bootstrapNews({
					newsPerPage: 3,
					autoplay: true,
					pauseOnHover: true,
					navigation: false,
					direction: 'up',
					newsTickerInterval: 2500,
					onToDo: function () {
						//console.log(this);
					}
				});
			});
		</script>

@yield('scripts')		

</body>

</html>