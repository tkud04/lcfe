@extends("layout")

@section('title',"Admin Center - Add Deal")

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                        	   <div class="card">
                        	     <div class="card-body">
                        	       <h1 class="card-title" style="color: #fbb710 !important; padding: 5px;">Add Deal</h1>
                        	       <h3 class="card-text" style="color: #fbb710 !important; padding: 5px;">Add a new deal to the platform</h3>
                        
                                   <form action="{{url('cobra-add-deal')}}" method="post" class="mb-50">
                                   	{!!csrf_field()!!}
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="name" value="" placeholder="Deal name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <select class="form-control" name="type" value="none" required>
                                        	<option value="none">Select deal type</option>
                                            <option value="deal">Deal</option>
                                            <option value="bundle">Bundle products</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <select class="form-control" name="category" value="none" required>
                                        	<option value="none">Select deal category</option>
                                            @foreach($c as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="amount" value="" placeholder="Price(&#8358;)" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <textarea class="form-control" name="description" value="" placeholder="Brief description" required></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="images" value="" placeholder="Image URIs (http://website.com/my-image.png or images/my_image.png)" required>
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