<!-- send message-->
<section class="contact py-5">
	<div class="container wow fadeInUp">
		<h2 class="heading mb-lg-5 mb-4">Open an account with us, it's super EASY</h2>
		<div class="row contact-grids w3-agile-grid">
			<div id="register-online" class="col-md-12 contact-grid1 w3-agile-grid">
			  <div class="row">
			  <div class="col-md-6">
			    <a id="register-download-btn" href="#" data-g='download/account.pdf'>Click to download registration form</a><br>
				<p>Download the form, fill with your details and submit to our head quarters. Please see below for address.</p>
			  </div>
			  <div class="col-md-6">
			    <button id="register-pay-btn" class="btn btn-primary btn-lg">Register online</button><br>
				<p>Fill in your details and proceed to payment..</p>
			  </div>
			  </div>
			</div>
			<div id="register-online-1" class="col-md-12 contact-grid1 w3-agile-grid">
				<h4 class="text-success">Registration fee: &#8358;100,000.00</h4>
			     <small style="color:red;">All fields are required</small>
				<form id="register-form" method="post">
				    {!! csrf_field() !!}
				    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" class="form-control" placeholder="First name" id="fname" name="fname" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control" placeholder="Last name" id="lname" name="lname" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" placeholder="Enter address" id="address" name="address" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" placeholder="Enter city" id="city" name="city" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <select class="w-100" id="state" name="state" required>
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
                          <input type="text" class="form-control" id="phone" placeholder="Your phone number" name="phone" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email Address</label>
                          <input type="text" class="form-control" id="em" name="email" placeholder="Your email address" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                      	<div class="form-group">
                        	<p class="form-control-plaintext">Powered by <img class="img img-fluid" style="width: 50% !important;" src="images/ps.jpg"/></p>
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
                              $total = 100000;							
							?>
                            	<input type="hidden" id="pem" name="email" value=""> {{-- required --}}
                            	<input type="hidden" name="amount" value="{{$total * 100}}"> {{-- required in kobo --}}
                            	<input type="hidden" name="metadata" id="nd" value="" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                            	<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                           	 <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                                <input type="hidden" id="meta-comment" value="">  
                            <!-- End payment form -->
					
					<button id="pay-card" type="submit" class="nbtn text-capitalize start">Proceed</button>
				</form>
			</div>
		</div>
		
	</div>
</section>
<!-- //send message-->