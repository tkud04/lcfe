@extends("layout")

@section('title',"Deposit To Your KloudPay Wallet")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading mt-1">Add Money to KloudPay</h2>
            <hr class="my-4">
             <div class="checkout_details_area mt-50 clearfix">
                            <div class="card">                        	     
                        	     <div class="card-body">
                        	       <h3 class="card-title" style="color: #fbb710 !important; padding: 5px;">Add funds to your KloudPay wallet</h3>                     
                                   <h5 class="card-title" style="color: #fbb710 !important; padding: 5px;">Maximum: &#8358;500,000.00</h5>                     
                                   <form action="" id="checkout-form" method="post">
                                   	{!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <p class="form-control-plaintext"><i class="fa fa-briefcase"></i> KloudPay: &#8358;{{$wallet['balance']}}</p><br>
                                        <input type="number" class="form-control" name="orig-amount" id="amount" value="" placeholder="Enter amount" min="0" max="500000" required><br>
                                        <p class="form-control-plaintext">Powered by <img class="img img-responsive" src="img/ps.jpg"/></p>
                                    </div>
                                    <script>
                             	let mc = {
                             	                'type': 'kloudpay'
                                             };
                             
                             </script>
                            <!-- payment form -->
                            	<input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                            	<input type="hidden" name="amount" id="meta-amount" value=""> {{-- required in kobo --}}
                            	<input type="hidden" name="metadata" id="nd" value="" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                            	<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                           	 <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                            <!-- End payment form -->
                            	
                            <input type="hidden" id="card-action" value="{{url('pay')}}">
                            	
                                    <div class="col-12">
                                        <button type="submit" id="deposit-card" class="amado-btn">Make a deposit</button>                                                                           
                                    </div>
                                </div>
                            </form>
                        	     </div>
                        	   </div>                           
                       
                        </div>
          </div>
@stop