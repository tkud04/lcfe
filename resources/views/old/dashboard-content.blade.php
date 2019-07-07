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
                    <form class="mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <div class="line"></div>
						<div class="form-group">
						         <h3 class="text-primary form-control-plaintext">Account Summary as at <em><?=date("d/m/Y h:i A")?></em></h3><br> 
						 </div>
						@if(empty($bankDetails))
						<div class="form-row">
							<div class=" col-md-12">
								<h4>Account summary unavailable</h4>
								<a class="btn btn-info" href="{{url('add-account')}}">Add account details</a>
								
							</div>
						</div>
						@else
					    <div class="form-row">
                           <div class=" col-md-6">
						      <div class="form-group">
							    <label for="fname"><strong>Account Holder Name </strong></label>
						          <p class="form-control-plaintext">{{$user->fname." ".$user->lname}}</p><br> 
						      </div>
							  <div class="form-group">
							  <label for="uname"><strong>Account Holder Address</strong></label>
						          <p class="form-control-plaintext">{{$bankDetails['address']}}</p><br> 
						      </div>
							  <div class="form-group">
							  <label for="pass"><strong>Initial Balance </strong></label>
						          <p class="form-control-plaintext">${{$bankDetails['initial_balance']}}</p><br> 
						      </div>
						   </div>
						   <div class="col-md-6">
						      <div class="form-group">
							    <label for="lname"><strong>Last Deposit Date </strong></label>
						          <p class="form-control-plaintext">13/02/2019</p><br> 
						      </div>
							  <div class="form-group">
							  <label for="email"><strong>Last Deposit Name </strong></label>
						          <p class="form-control-plaintext">{{$bankDetails['last_deposit_name']}}</p><br> 
						      </div>
							  <div class="form-group">
							    <label for="lname"><strong>Last Deposit </strong></label>
						         <p class="form-control-plaintext">	${{$bankDetails['last_deposit']}}</p><br> 
						      </div>
						   </div>
						   <div class="col-md-12">
							  <div class="form-group">
							    <label for="pass_confirmation"><strong>Current Balance</strong></label>
						          <p class="form-control-plaintext">${{$bankDetails['balance']}}</p><br> 
						      </div>
						   </div>
						</div>
						@endif
                    </form>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area mb-100">
                       <form class="mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <div class="line"></div>
						<div class="form-group">
						         <h4 class="text-info form-control-plaintext">Transfer Money</h4><br> 
						      </div>
					    <div class="form-row">
                           <div class=" col-md-6">
						      <div class="form-group">
							    <label for="bname"><strong>Bank Name </strong></label>
						          <input type="text" class="form-control" name="bname" placeholder="Bank name"><br> 
						      </div>
							  <div class="form-group">
							  <label for="baddress"><strong>Bank Address</strong></label>
						          <input type="text" class="form-control" name="baddress" placeholder="Bank address"><br> 
						      </div>
							  <div class="form-group">
							  <label for="acname"><strong>Account Name </strong></label>
						          <input type="text" class="form-control" name="acname" placeholder="Account name" value="{{$user->username}}"><br>  
						      </div>
							  <div class="form-group">
							  <label for="acnumber"><strong>Account Number </strong></label>
						          <input type="text" class="form-control" name="acnumber" placeholder="Account number"><br> 
						      </div>
							  <div class="form-group">
							  <label for="iban"><strong>IBAN </strong></label>
						          <input type="text" class="form-control" name="bname" placeholder="IBAN"><br> 
						      </div>
						   </div>
						   <div class="col-md-6">
						      <div class="form-group">
							    <label for="routing"><strong>Routing Number </strong></label>
						          <input type="text" class="form-control" name="routing" placeholder="Routing number"><br> 
						      </div>
							  <div class="form-group">
							  <label for="swift"><strong>Swift Code </strong></label>
						          <input type="text" class="form-control" name="swift" placeholder="Swift code"><br> 
						      </div>
							  <div class="form-group">
							    <label for="transfer-type"><strong>Transfer Type </strong></label>
						         <select class="form-control" name="transfer-type">
								    <option value="none">Select transfer type</option>
								    <option value="instant">Instant transfer</option>
								    <option value="inter">Interbank</option>
								 </select><br> 
						      </div>
							  <div class="form-group">
							    <label for="amount"><strong>Amount to Pay </strong></label>
						         <input type="text" class="form-control" name="amount" placeholder="Enter amount"><br> 
						      </div>
							  <div class="form-group">
							    <label for="transfer-code"><strong>Transfer Code </strong></label>
						         <input type="password" class="form-control" name="transfer-code" placeholder="Transfer code" value="jgfdhgfghdfh"><br> 
						      </div>
						   </div>
						   <div class="col-md-6">
						      <center> <button id="transfer-submit" class="btn credit-btn m-2">Submit</button></center>
						   </div>
						   <div class="col-md-6">
						      <center> <button id="transfer-reset" class="btn credit-btn btn-2 m-2">Reset</button></center>
						   </div>
						</div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->