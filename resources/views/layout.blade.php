 @include('head')
 @include('header')

<!-- notifications -->
<section class="contact">
	<div class="container wow fadeInUp">
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