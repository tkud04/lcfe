<div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <p>Showing 1-8 0f 25</p>
                                <div class="view d-flex">
                                    <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                                <div class="sort-by-date d-flex align-items-center mr-15">
                                    <p>Sort&nbsp;</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortBydate">
                                            <option value="date">Date</option>
                                            <option value="newest">Newest</option>
                                            <option value="price">Price</option>
                                        </select>
                                    </form>
                                </div>
                                
                                <div class="view-product d-flex align-items-center mr-15">
                                    <p>Category&nbsp;</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortCategory">
                                        	@foreach($c as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
