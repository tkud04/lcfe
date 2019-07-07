@extends("layout")

@section('title',"Log in")

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="card bg-dark text-white">
                        	     <img class="card-img" src="img/login.jpg" alt="KloudTransact - Create an account." style="height: 25% !important;">
                        	     <div class="card-img-overlay">
                        	       <h1 class="card-title" style="color: #fbb710 !important; padding: 5px;">Log in</h1>
                        	       <h3 class="card-text" style="color: #fbb710 !important; padding: 5px;">Log in to your account.</h3>
                        
                                   <form action="{{url('login')}}" method="post">
                                   {!!csrf_field()!!}
                                   <input type="hidden" name="return" value="{{$return}}"/>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="id" value="" placeholder="Email or phone number" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="pass" value="" placeholder="Password" required>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="remember_token">
                                            <label class="custom-control-label text-white" for="customCheck2">Remember me</label>
                                        </div>                                   
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                       <a href="{{url('forgot-password')}}" class="text-white">Reset password</a>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button type="submit" class="amado-btn">Log in</button>                                                                           
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