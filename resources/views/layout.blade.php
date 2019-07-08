 @include('head')
 @include('header')

<!-- notifications -->
<section class="contact py-5">
	<div class="container wow fadeInUp">
		<h2 class="heading mb-lg-5 mb-4">Register</h2>
		<div class="row contact-grids w3-agile-grid">
			<div class="col-md-12 contact-grid1 w3-agile-grid">
			        <!--------- Cookie consent-------------->
        	@include('cookie-consent')
        
        <!--------- Session notifications-------------->
        	<?php
               $pop = ""; $val = "";
               
               if(isset($signals))
               {
                  foreach($signals['okays'] as $key => $value)
                  {
                    if(session()->has($key))
                    {
                  	$pop = $key; $val = session()->get($key);
                    }
                 }
              }
              
             ?> 
              
                 @if($pop != "" && $val != "")
                   @include('session-status',['pop' => $pop, 'val' => $val])
                 @endif
        	<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ['errors'=>$errors])
                     @endif 
    
            </div>
		</div>
		
	</div>
</section>
<!-- //send message-->
@yield("banner")
@yield("content")         


@include("footer")
@include("foot")