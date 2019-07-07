@extends("layout")

@section('title',"My KloudPay Wallet")

@section('styles')
  <!-- DataTables CSS -->
  <link href="lib/datatables/css/buttons.bootstrap.min.css" rel="stylesheet" /> 
  <link href="lib/datatables/css/buttons.dataTables.min.css" rel="stylesheet" /> 
  <link href="lib/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet" /> 
@stop

@section('content')
<div class="row">
          <div class="col-lg-12 mt-2 mx-auto text-center">
            <h2 class="section-heading mt-1">KloudPay Wallet</h2>
            <hr class="my-4">
             <div class="checkout_details_area mt-50 clearfix">
                            <div class="card">                        	     
                        	     <div class="card-body">
                        	       <h3 class="card-title" style="color: #fbb710 !important; padding: 5px;"><i class="fa fa-briefcase"></i> Balance: &#8358;{{number_format($wallet['balance'],2)}}</h3>                     
                                   <form action="#" method="get">
                                <div class="row">
                                	<div class="col-12">
                                        <a href="{{url('deposit')}}" class="amado-btn mb-2">Make a Deposit</a>
                                        <a href="{{url('withdraw')}}" class="amado-btn mb-2">Make a Withdrawal</a>
                                         <a href="{{url('kloudpay-transfer')}}" class="amado-btn">Transfer Funds to Others</a>                                 
                                    </div>
                                    <div class="col-12 mt-5 mb-3">
                                        <div class="card border-0">
                <div class="card-title">
                   <h4>Latest Activity</h4>                  
                </div>
                <div class="card-body">
                	<div class="table-responsive m-t-5">
                	   <table id="" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                	     <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($transactions != null && count($transactions) > 0)
                                              @foreach($transactions as $t)
                                                 <tr>
                                                  <td><span class="badge {{$t['badgeClass']}} text-uppercase">{{$t['type']}}</span></td>
                                                  <td>{!! $t['description'] !!}</td>
                                                  <td>&#8358;{{number_format($t['amount'],2)}}</td>
                                                  <td>{{$t['date']}}</td>
                                                 </tr>
                                              @endforeach
                                            @endif	
                                        </tbody>
                       </table>
                    </div>
                </div>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <a href="{{url('transactions')}}" class="amado-btn">See more</a>                                                                             
                                    </div>
                                </div>
                            </form>
                        	     </div>
                        	   </div>                           
                       
                        </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12 mx-auto text-center">
          	<img src="img/ad-1.png" class="img-fluid">
          </div>
        </div>      	
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