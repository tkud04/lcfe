@extends("layout")

@section('title',"Withdraw To Your Bank Account")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading mt-1">Withdraw Funds from KloudPay</h2>
            <hr class="my-4">
             <div class="checkout_details_area mt-50 clearfix">
                            <div class="card">                        	     
                        	     <div class="card-body">
                        	       <h3 class="card-title" style="color: #fbb710 !important; padding: 5px;">Withdraw funds from your KloudPay wallet</h3>                     
                                   <h5 class="card-title" style="color: #fbb710 !important; padding: 5px;">Minimum: &#8358;5,000.00</h5>                     
                                   <form action="{{url('withdraw')}}" method="post">
                                   	{!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <p class="form-control-plaintext"><i class="fa fa-briefcase"></i> KloudPay: &#8358;{{number_format($wallet['balance'],2)}}</p><br>
                                        <input type="number" class="form-control" name="amount" id="amount" value="" placeholder="Enter amount" min="5000" max="100000" required><br>
                                        <p class="form-control-plaintext"><i class="fa fa-money"></i> Withdrawal fee: &#8358;{{number_format($fee,2)}}</p><br>
                                        <p class="form-control-plaintext">Powered by <img class="img img-responsive" src="img/ps.jpg"/></p>
                                    </div>
                            	
                                    <div class="col-12">
                                        <button type="submit" class="amado-btn">Make a withdrawal</button>                                                                           
                                    </div>
                                </div>
                            </form>
                        	     </div>
                        	   </div>                           
                       
                        </div>
          </div>
@stop