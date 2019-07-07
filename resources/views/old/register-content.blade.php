    <!-- ##### Services Area Start ###### -->
    <section class="services-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <div class="line"></div>
                        <p>Don't have an account?</p>
                        <h2>Create Account</h2>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-12">
                    <form action="{{url('register')}}" method="post" class="mb-100 wow fadeInUp" data-wow-delay="100ms">
                    	{{csrf_field()}}
                        <div class="line"></div>
						<div class="form-group">
						         <p class="form-control-plaintext">* Required field</p><br> 
						      </div>
					    <div class="form-row">
                           <div class=" col-md-6">
						      <div class="form-group">
							    <label for="fname"><strong>First name <span class="required">*</span></strong></label>
						         <input type="text" class="form-control" name="fname" placeholder="First name"><br> 
						      </div>
							  <div class="form-group">
							  <label for="uname"><strong>Username <span class="required">*</span></strong></label>
						         <input type="text" class="form-control" name="uname" placeholder="Username"><br> 
						      </div>
							  <div class="form-group">
							  <label for="pass"><strong>Password <span class="required">*</span></strong></label>
						         <input type="password" class="form-control" name="pass" placeholder="Password"><br> 
						      </div>
						   </div>
						   <div class="col-md-6">
						      <div class="form-group">
							    <label for="lname"><strong>Last name <span class="required">*</span></strong></label>
						         <input type="text" class="form-control" name="lname" placeholder="Last name"><br> 
						      </div>
							  <div class="form-group">
							  <label for="email"><strong>Email address <span class="required">*</span></strong></label>
						         <input type="text" class="form-control" name="email" placeholder="Email address"><br> 
						      </div>
							  <div class="form-group">
							    <label for="pass_confirmation"><strong>Confirm password<span class="required">*</span></strong></label>
						         <input type="password" class="form-control" name="pass_confirmation" placeholder="Confirm password"><br> 
						      </div>
						   </div>
						   <div class="col-md-12">
						      <center><button type="submit" class="btn credit-btn m-2">Create account</button></center>
						   </div>
						</div>
                    </form>
                </div>
            </div>
		</div>
	</section>