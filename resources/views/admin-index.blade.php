@extends("layout")

@section('title',"Admin Center")

@section('styles')
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="lib/datatables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatables/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatables/css/buttons.dataTables.min.css">
@stop

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading">Dashboard</h2>
            <hr class="my-4">
          </div>
</div>         
 <!-- Start Stats section -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 text-success"></i></span>
                                </div>
                                <div class="media-body media-text-right m-l-7">
                                    <h2>{{$totalSales}}</h2>
                                    <p class="m-b-0">Sales</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 text-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right m-l-7">
                                    <h2>{{$totalDeals}}</h2>
                                    <p class="m-b-0">Deals</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 text-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right m-l-7">
                                    <h2>{{$totalUsers}}</h2>
                                    <p class="m-b-0">Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- End Stats section -->  

<!-- Start Activity  section -->  
<div class="row">
          <div class="col-lg-12 mx-auto p-b-10">
            <div class="card">
                <div class="card-title">
                   <h4>Recent Activity </h4>                  
                </div>
                <div class="card-body">
                	<a href="{{url('cobra-transactions')}}" class="btn btn-success btn-block m-b-10" role="button">View more</a>
                	<div class="table-responsive m-t-40">
                	   <table id="admin-activity-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                	     <thead>
                                            <tr>
                                                <th>Activity</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if(count($transactions)  > 0)
                                               @foreach($transactions as $t)
                                                 <tr>                                          
                                                 <td>{{$t['activity']}}</td>
                                                 <td>{{$t['amount']}}</td>
                                                 <td>{{$t['date']}}</td>
                                                </tr>                                             
                                               @endforeach
                                            @endif
                                        </tbody>
                       </table>
                    </div>
                </div>
          </div><br>
          <div class="col-lg-12 mx-auto p-b-10">
            <div class="card">
                <div class="card-title">
                   <h4>Deals</h4>                  
                </div>
                <div class="card-body">
                	<a href="{{url('cobra-deals')}}" class="btn btn-success btn-block m-b-10" role="button">View more</a>
                	<div class="table-responsive m-t-40">
                	   <table id="admin-deals-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                	     <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>SKU</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if(count($deals)  > 0)
                                               @foreach($deals as $d)
                                               <tr>                                               
                                                 <?php
                                                  $img = $d['images'][0];
                                                  $dd = $d['data'];
                                                  ?>
                                                 <td><img class="img img-responsive" src="{{$img['url']}}"></td>
                                                 <td>{{$d['name']}}</td>
                                                 <td>{{$d['sku']}}</td>
                                                 <td>{{$dd['amount']}}</td>
                                                 <td>{{$d['type']}}</td>
                                               </tr>                                                 
                                               @endforeach
                                            @endif
                                        </tbody>
                       </table>
                    </div>
                </div>
          </div><br>
          <div class="col-lg-12 mx-auto p-b-10">
            <div class="card">
                <div class="card-title">
                   <h4>Auctions </h4>                  
                </div>
                <div class="card-body">
                	<a href="{{url('cobra-auctions')}}" class="btn btn-success btn-block m-b-10" role="button">View more</a>
                	<div class="table-responsive m-t-40">
                	   <table id="admin-auctions-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                	     <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Amount (&#8358;)</th>
                                                <th>Bids</th>
                                                <th>Ends</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if(count($auctions)  > 0)
                                               @foreach($auctions as $a)
                                               <tr>                                               
                                                 <td>{{$a['image']}}</td> 
                                                 <td>{{$a['name']}}</td> 
                                                 <td>{{$a['amount']}}</td>
                                                 <td>{{$a['bids']}}</td>
                                                 <td>{{$a['ends']}}</td>
                                               </tr>                                                
                                               @endforeach
                                            @endif
                                        </tbody>
                       </table>
                    </div>
                </div>
          </div>
</div>     
<!-- End Activity  section -->          
@stop

@section('scripts')
    <!-- DataTables js -->
       <script src="lib/datatables/js/datatables.min.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="lib/datatables/js/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="lib/datatables/js/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="lib/datatables/js/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="lib/datatables/js/datatables-init.js"></script>
@stop