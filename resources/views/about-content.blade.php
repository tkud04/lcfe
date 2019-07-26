<!-- about -->
<section class="about py-5">
	<div class="container py-md-3 agile-info wow fadeInUp">
		<!--<h2 class="heading mb-md-5 mb-4">About Us</h2> -->
		<div class="row about-grids agile-info">
			<div class="col-lg-6 w3-agile-grid mb-lg-0 mb-5">
				<p>We at Lagos commodities & Futures Exchange Limited seek to provide topnotch services to our clients 
				by ensuring real-time delivery to all our customers across the globe.</p>
				<p class="mt-2 mb-3">With our quality products that ranges from cocoa, white maize, yellow maize, cotton, sorghum, sesame, cashew etc, we ensure the best customer experience by eliminating all possible forms of glitches.
					</p>
			</div>
			<div class="col-lg-3 w3-agile-grid col-md-4 pr-md-0">
				<h3 class="margin wow fadeInLeft">4+ years experience</h3>
				<h3 class="black wow fadeInRight">Commodities Trade</h3>
			</div>
			<div class="col-lg-3 w3-agile-grid col-md-4 mt-md-0 mt-4">
				<h3 class="margin green wow fadeInRight">Futures Exchange</h3>
				<h3 class="grey wow fadeInLeft">Fast Delivery <br/><br/></h3>
			</div>
		</div>
	</div>
</section>
<!-- //about -->

<!-- team --> 
<section class="team py-5">
	<div class="container py-md-3 wow fadeInUp">
		<h3 class="heading mb-4" style="color:#dc3545">Meet Our Leadership</h3>
		<h2 class=" mb-4">Click to view more</h2>
		<div class="row">
			<div class="col-md-12">
				    <div id="about-slider-1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:100px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="lib/jssor/img/l2/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:100px;overflow:hidden;">
		   <?php
		     foreach($leadership as $key => $value){
				 $uu = 'images\team\\'.$value;
		    ?>
            <div class="abx" data-abx="<?=$key?>">
                <img data-u="image" src="<?=$uu?>" />
            </div>
			<?php
			 }
			?>
        </div>
    </div>
    <script type="text/javascript">jssor_about_slider_init("about-slider-1");</script>
    <!-- #endregion Jssor Slider End -->
			</div>
		</div>
	</div>
</section>

<!-- //team --> 


<!-- contact -->
<section class="contact py-5">
	<div class="container wow fadeInUp">
		<h2 class="heading mb-lg-5 mb-4">Contact Us</h2>
		<div class="row contact-grids w3-agile-grid">
			<div class="row col-md-4 col-sm-6 contact-grid1 w3-agile-grid">
				<div class="col-3 text-center">
					<i class="fas fa-envelope-open"></i>
				</div>
				<div class="col-9 p-0">
					<h4>Email</h4>
					<p><a href="mailto:info@example.com">info@lcfe.ng</a></p>
				</div>
			</div>
			<div class="row col-md-4 col-sm-6 mt-sm-0 mt-4 contact-grid1 w3-agile-grid">
				<div class="col-3 text-center">
					<i class="fas fa-phone"></i>
				</div>
				<div class="col-9 p-0">
					<h4>Call Us</h4>
					<p>+234 812 219 6075</p>
				</div>
			</div>
			<div class="row col-md-4 col-sm-6 mt-md-0 mt-4 contact-grid1 w3-agile-grid">
				<div class="col-3 text-center">
					<i class="fas fa-map-marker"></i>
				</div>
				<div class="col-9 p-0">
					<h4>Location</h4>
					<p>1st floor, Niger house, UAC building, <br>1-5 Odunlami street, Lagos Island, Lagos.</p>
				</div>
			</div>
		</div>
		
	</div>
</section>
<!-- //contact -->

<!-- //contact -->
<?php
foreach($bios as $b){
	$uu = 'images\team\\'.$value;
	$id = "abx-".$b['id'];
	$title = $b['title'];
	$desc = $b['desc'];
?>
    <input type="hidden" id="<?=$id?>" data-title="<?=$title?>" data-desc="<?=$desc?>" />
<?php
}
?>
<!-- //contact -->




