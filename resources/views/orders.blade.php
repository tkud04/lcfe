@extends("layout")

@section('title',"My Orders")

@section('styles')
  <!-- DataTables CSS -->
  <link href="lib/datatables/css/buttons.bootstrap.min.css" rel="stylesheet" /> 
  <link href="lib/datatables/css/buttons.dataTables.min.css" rel="stylesheet" /> 
  <link href="lib/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet" /> 
@stop

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading" style="color: #fbb710 !important; padding: 5px;">My Orders</h2>
            <hr class="my-4">
          </div>
</div>      

<!-- Start Deals  section -->  
<div class="row">
          <div class="col-lg-12 mx-auto p-b-10">
            <div class="card border-0">
                <div class="card-title">
                   <h4>All Orders </h4>                  
                </div>
                <div class="card-body">
                	<div class="table-responsive m-t-40">
                	   <table id="transactions-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                	     <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if($orders != null && count($orders) > 0)
                                              @foreach($orders as $o)
                                                <?php
                                                  $url = url('invoice').'?on='.$o['number']; 
                                                ?>
                                                 <tr>
                                                  <td>{{$o['number']}}</td>
                                                  <td>&#8358;{{number_format($o['amount'],2)}}</td>
                                                  <td>{{$o['status']}}</td>
                                                  <td><a class="btn btn-primary" href="{{$url}}" target="_blank">View Invoice</a></td>
                                                 </tr>
                                              @endforeach
                                            @endif
                                        </tbody>
                       </table>
                    </div>
                </div>
          </div><br>
          
</div>     
<!-- End Deals  section -->  
@include('ad-space')      
       
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