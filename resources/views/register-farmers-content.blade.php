<!-- send message-->
<section class="contact py-5">
	<div class="container wow fadeInUp">
		<h2 class="heading mb-lg-5 mb-4">Register</h2>
		<div class="row contact-grids w3-agile-grid">
			<div class="col-md-12 contact-grid1 w3-agile-grid">
				<h4><a href="#">Click here</a> to download the registration form or fill the form below</h4>
			     <small style="color:red;">All fields are required</small>
				<form action="{{url('register-farmers')}}" method="post">
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
                          <input type="text" class="form-control" placeholder="State" name="state" required>
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
					<button type="submit" class="nbtn text-capitalize start">Submit</button>
				</form>
			</div>
		</div>
		
	</div>
</section>
<!-- //send message-->