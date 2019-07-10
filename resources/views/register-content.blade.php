<!-- send message-->
<section class="contact py-5">
	<div class="container wow fadeInUp">
		<h2 class="heading mb-lg-5 mb-4">Register</h2>
		<div class="row contact-grids w3-agile-grid">
			<div class="col-md-12 contact-grid1 w3-agile-grid">
				<h4><a href="#">Click here</a> to download the registration form or fill the form below</h4>
			     <small style="color:red;">All fields are required</small>
				<form id="register-form" method="post">
				    {!! csrf_field() !!}
				    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" class="form-control" placeholder="First name" name="fname" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control" placeholder="Last name" name="lname" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" placeholder="Enter address" name="address" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" placeholder="Enter city" name="city" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <select class="w-100" name="state" required>
                                        <option value="none">Select state</option>
                                        <?php 
                                          foreach($states as $key => $value){
                                          	#$selectedText = ($key == $sd['state']) ? "selected='selected'" : ""; 
											$selectedText = "";
                                        ?>
                                        <option value="<?=$key?>" <?=$selectedText?> ><?=$value?></option>
                                        <?php 
                                          }
                                        ?>
                                    </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
                          <input type="text" class="form-control" placeholder="Your phone number" name="phone" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email Address</label>
                          <input type="text" class="form-control" name="email" placeholder="Your email address" required>
                        </div>
                      </div>
                    </div>
					<input type="hidden" id="card-action" value="{{url('pay')}}">
                            	
                             <script>
                             	let mc = {
                             	                'type': 'register',
                                                 'comment': '',
                                                 'fname': "",
                                                 'lname': "",
                                                 'address': "",
                                                 'city': "",
                                                 'state': "",
                                                 'email': "",
                                                 'phone': "",
                                                
                                                 'ssa': "off"
                                             };
                             
                             </script>
                            <!-- payment form -->
							<?php
                              $total = 50000;							
							?>
                            	<input type="hidden" id="pem" name="email" value=""> {{-- required --}}
                            	<input type="hidden" name="amount" value="{{$total * 100}}"> {{-- required in kobo --}}
                            	<input type="hidden" name="metadata" id="nd" value="" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                            	<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                           	 <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                                <input type="hidden" id="meta-comment" value="">  
                            <!-- End payment form -->
					
					<button id="pay-card" type="submit" class="nbtn text-capitalize start">Submit</button>
				</form>
			</div>
		</div>
		
	</div>
</section>
<!-- //send message-->