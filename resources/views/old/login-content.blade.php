    <!-- ##### Services Area Start ###### -->
    <section class="services-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <div class="line"></div>
                        <p>Returning customer?</p>
                        <h2>Sign in here</h2>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-12">
                	<form action="{{url('login')}}" id="" method="post">
											  {{csrf_field()}}
												<div class="form-group">
												    <label for="email"><strong>Username or email <span class="required">*</span></strong></label>
													<input class="form-control" type="text" id="email" name="email" placeholder="Username or Email address" value="" />
													<p class="text-danger text-bold" id="eu">This field is required</p>
												</div>
												<div class="form-group">
													<label for="pass"><strong>Password <span class="required">*</span></strong></label>
													<input class="form-control" type="password" id="password" name="password" />
													<p class="text-danger text-bold" id="ep">This field is required</p>
												</div>
												<div class="form-group">					
													<button type="submit" id="" class="btn btn-success">Submit</button>
													<label>
														<input type="checkbox" name="remember_me" />
														 Remember me 
													</label>
												</div>
												<p class="lost-password">
													<a href="#">Forgot password?</a>
												</p>
												<p class="text-info" id="login-loading">Logging you in.. </p>
											</form>
                </div>
            </div>
		</div>
	</section>