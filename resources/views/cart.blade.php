@extends("layout")

@section('title',"Cart")

@section('content')
<div class="container-fluid">
                <div class="row">
                	
                    <div class="col-12 col-lg-8">
                    	<form action="{{url('update-cart')}}" method="post">
                	      {!! csrf_field() !!}
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@if(count($cart)  > 0)
                                    @foreach($cart as $c) 
                                    <?php
                                     $deal = $c['deal'];
                                     $data = $deal['data'];
                                     $cartImages = $deal['images'];
                                     $removeURL = url('remove-from-cart').'?asf='.$deal['sku'];
                                    ?>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="{{$cartImages[0]['url']}}" alt="{{$deal['name']}}">{{$deal['name']}}</a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{$deal['name']}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>&#8358;{{number_format($data['amount'],2)}}</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity[]" value="{{$c['qty']}}">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">
                                            <a href="{{$removeURL}}" class="btn amado-btn">Remove</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <center><button type="submit" class="btn amado-btn">Update cart</button></center>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                     </form> 
                    </div>
                    
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <?php
                                     $subtotal = $cartTotals['subtotal'];
                                     $delivery = $cartTotals['delivery'];
                                     $total = $cartTotals['total'];
                                    ?>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>&#8358;{{number_format($subtotal,2)}}</span></li>
                                <li><span>delivery:</span> <span>&#8358;{{number_format($delivery,2)}}</span></li>
                                <li><span>total:</span> <span>&#8358;{{number_format($total,2)}}</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="{{url('checkout')}}" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
             </div>             
@stop