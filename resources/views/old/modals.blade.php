			<!-- Login Modal -->
			<div id="code-modal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<button type="button" class="close btn btn-warning" data-dismiss="modal">&times; close</button>
						<div class="modal-body">
											<p class="coupon-text">Enter your code to complete this transaction</p>
											<form id="code-div">
											
												<div class="form-group">
												    <label for="email"><strong>Code:<span class="required">*</span></strong></label>
													<input class="form-control" type="text" id="code" name="code" placeholder="Enter code here" value="" />
													<p class="text-danger text-bold" id="eu">This field is required</p>
												</div>
												
												<div class="form-group">					
													<button id="ls" class="btn btn-success">Submit</button>
													
												</div>
												
												<p class="text-info" id="code-loading"></p>
											</form>

						</div>
					</div>
				</div>
			</div>