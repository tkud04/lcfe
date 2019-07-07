@extends("layout")

@section('title',"Sign up")

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                        	   <div class="card bg-dark text-white">
                        	     <img class="card-img" src="img/login.jpg" alt="KloudTransact - Create an account." style="height: 25% !important;">
                        	     <div class="card-img-overlay">
                        	       <h1 class="card-title" style="color: #fbb710 !important; padding: 5px;">Create an account</h1>
                        	       <h3 class="card-text" style="color: #fbb710 !important; padding: 5px;">Create an account and start BIDDING</h3>
                        
                                   <form action="{{url('register')}}" method="post" class="text-white mb-50">
                                   	{!!csrf_field()!!}
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="fname" value="" placeholder="First name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="lname" value="" placeholder="Last name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="email" class="form-control" name="email" value="" placeholder="Valid email address" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="pass" value="" placeholder="Password" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="pass_confirmation" value="" placeholder="Confirm password" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="phone" value="" placeholder="Phone number" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="remember">
                                            <label class="custom-control-label text-white" for="customCheck2">Send me useful bidding tips and other promotional offers</label>
                                        </div>                                   
                                    </div>
                                    
                                    <div class="col-12">
                                        <button type="submit" class="amado-btn">Submit</button>                                                                           
                                    </div>
                                </div>
                            </form>
                        	     </div>
                        	   </div>                           

                            
                        </div>
                    </div>
                </div>
</div>
@stop