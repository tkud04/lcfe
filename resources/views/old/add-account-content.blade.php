    <!-- ##### Post Details Area Start ##### -->
    <section class="post-news-area section-padding-100-0">
        <div class="container">
		    <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <div class="line"></div>
                        <p>Welcome back,</p>
                        <h2>{{$user->fname." ".$user->lname}}!</h2>
                        <?php $acnum = isset($bankDetails['account_number']) ? $bankDetails['account_number'] : "Unknown";?>
						<p>Account Number: <span class="text-danger">{{$acnum}}</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Account Details Area -->
				 <div class="col-12 col-lg-8">
                    <form class="mb-100 wow fadeInUp" data-wow-delay="100ms" action="{{url('add-account')}}" method="post">
                    		{{csrf_field()}}
                        <div class="line"></div>
						<div class="form-group">
						         <h3 class="text-primary form-control-plaintext">Add Account Details</h3><br> 
						 </div>
						@if(empty($bankDetails))
						<div class="form-row">
                           <div class=" col-md-6">
						      <div class="form-group">
							    <label for="fname"><strong>Account Holder Name </strong></label>
						          <p class="form-control-plaintext">{{$user->fname." ".$user->lname}}</p><br> 
						      </div>
							  <div class="form-group">
							  <label for="uname"><strong>Account Holder Address</strong></label>
						          <input type="text" class="form-control" name="address" placeholder="Account holder full address"><br> 
						      </div>
							  <div class="form-group">
							  <label for="pass"><strong>Initial Balance </strong></label>
						          <input type="text" class="form-control" name="initial_balance" placeholder="Initial Balance"><br> 
						      </div>
						   </div>
						   <div class="col-md-6">     
							  <div class="form-group">
							  <label for="email"><strong>Account Number</strong></label>
						          <input type="text" class="form-control" name="account_number" placeholder="Preferred Account Number"><br> 
						      </div>
						      <div class="form-group">
							  <label for="email"><strong>Last Deposit Name </strong></label>
						          <input type="text" class="form-control" name="last_deposit_name" placeholder="Last Deposit Name"><br> 
						      </div>
							  <div class="form-group">
							    <label for="lname"><strong>Last Deposit </strong></label>
						         <input type="text" class="form-control" name="last_deposit" placeholder="Last Deposit amount($)"><br> 
						      </div>
						   </div>
						   <div class="col-md-12">
							  <div class="form-group">
							    <label for="pass_confirmation"><strong>Current Balance</strong></label>
						          <input type="text" class="form-control" name="balance" placeholder="Current Balance ($)"><br> 
						      </div>
						   </div>
						  <div class="col-md-12">
						      <center><button type="submit" class="btn credit-btn m-2">Submit</button></center>
						   </div>
						</div>
						@else
					    
						@endif
                    </form>
                </div>       
              </div>                
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->