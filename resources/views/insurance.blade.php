<section class="quotes py-5 text-centerv wow fadeInUp">
    	<div class="container-fluid">
		<div class="row">
			<!-- Insurance Companies -->
			<div class=" col-lg-6">
				<div id="insurance-slider" style="position:relative;margin:0 auto;top:0px;left:0px;width:600px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="lib/jssor/img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:600px;height:500px;overflow:hidden;">
            <?php
			#$warehouses = ['images/product-6.jpg','images/product-5.jpg','images/product-7.jpg','images/wh-11.jpg','images/wh-22.jpg','images/wh-33.jpg','images/wh-44.jpg','images/wh-55.jpg'];
			$insurance = ['images/insurance-1.png','images/insurance-2.jpg','images/insurance-3.png','images/insurance-4.png'];
		     shuffle($insurance);
			 foreach($insurance as $ia){
		    ?>
            <div>
                <img data-u="image" src="<?=$ia?>" />
            </div>
			<?php
			 }
			?>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb072" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
                    <circle class="b" cx="8000" cy="8000" r="6666.7"></circle>
                </svg>
                <div data-u="numbertemplate" class="n"></div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora073" style="width:40px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora073" style="width:40px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_slider_init("insurance-slider");</script>
    <!-- #endregion Jssor Slider End -->
			</div>
			<!-- Counter -->
			<div class="col-lg-6 mb-10">
				<h3 class="heading mb-lg-5 mb-4">Insurance Companies</h3>
				<p>This is some text to describe the insurance companies on display. The text should be easy to understand and fill up this space.</p><br>
				<p>This is some text to describe the insurance companies on display. The text should be easy to understand and fill up this space.</p><br>
				<p>This is some text to describe the insurance companies on display. The text should be easy to understand and fill up this space.</p><br>
			</div>
			<!-- //Counter -->
			<div class="clearfix"> </div>
			<!-- //Clients -->
		</div>
	</div>
</section>