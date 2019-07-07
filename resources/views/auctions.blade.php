@extends("layout")

@section('title',"Kloud Auctions")

@section('content')
<?php $ct = (isset($category) && $category != null) ? " - ".$category : ""; ?>
<div class="container-fluid">
            <h2 class="category-header">Kloud Auctions{{$ct}}</h2>             
                @include('deals-filter')
                
                <div class="row" id="auction-section">
                 @if(count($auctions)  > 0)
                  @foreach($auctions as $a)
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            
                            <!-- Start #clockdiv-->
                                   	<div class="clockdiv">
                                   	<div class="row">
                                   	<div class="col-6">
					<div class="countdown d-inline">
						<span class="deadline">Expiration time</span>
					</div>
				</div>
				<div class="col-3"></div>
				<div class="col-3 d-inline">18 bids</div>
				</div>
				</div>
				<!-- End #clockdiv-->
			
                                
                            <!-- Product Image -->
                            <div class="product-img">
                            	<center>
                                <img src="img/product-img/product1.jpg" alt="">
                                <!-- Hover Thumb --
                                <img class="hover-img" src="img/product-img/product2.jpg" alt=""> -->    
                                </center>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">&#8358;70,000</p>
                                    <a href="{{url('deal')}}">
                                        <h6>Modern Chair</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="cart">
                                        <a href="{{url('cart')}}" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>
                        @endforeach
                  @else
                  <p class="text-primary">No auctions at the moment. Check back later? </p>
                  @endif
                    </div>
                    
 
                @if(count($auctions) > 0)
                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                <li class="page-item"><a class="page-link" href="#" disabled>&lt;&lt;</a></li>  
                                <li class="page-item active"><a class="page-link" href="#">&gt;&gt;</a></li>  
                            </ul>
                        </nav>
                    </div>
                </div>
                @endif
            </div>
@stop

@section('scripts')
<script src="lib/raf/requestAnimationFrame.js" ></script>
<script src="js/countdown.js" ></script>
<script src="js/countdown-init.js" ></script>
@stop