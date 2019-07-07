@extends("layout")

@section('title',"Admin Center - Auctions")

@section('styles')
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="lib/datatables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatables/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatables/css/buttons.dataTables.min.css">
@stop

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading">Auctions</h2>
            <hr class="my-4">
          </div>
</div>         
 
<!-- Start Deals  section -->  
<div class="row">
          <div class="col-lg-12 mx-auto p-b-10">
            <div class="card">
                <div class="card-title">
                   <h4>All Auctions </h4>                  
                </div>
                <div class="card-body">
                	<a href="{{url('cobra-add-auction')}}" class="btn btn-success btn-block m-b-10" role="button">Add new auction</a>
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
                                              <tr>
                                               @foreach($auctions as $d)
                                                 <td>{{$d['image']}}</td>
                                                 <td>{{$d['name']}}</td>
                                                 <td>{{$d['amount']}}</td>
                                                 <td>{{$d['bids']}}</td>
                                                 <td>{{$d['ends']}}</td>
                                                 <td>
                                                 	<?php
                                                       $egg = $d['deal_id']; $au = ""; $at = ""; $classs = "";
                                                       
                                                       if($d['status'] == "active")
                                                       {
                                                       	$au = url('cobra-end-auction');
                                                           $at = "End auction";
                                                           $classs = "btn-danger";
                                                       } 
                                                       else
                                                       {
                                                       	$au = url('cobra-add-auction');
                                                           $at = "Start auction";
                                                           $classs = "btn-primary";
                                                       }
                                                       
                                                       $au .= "?egg=".$egg;
                                                     ?>
                                                 	<a href="{{$au}}" class="btn {{$classs}}" role="button">{{$at}}</a>
                                                 </td>
                                               @endforeach
                                              </tr>
                                            @endif
                                        </tbody>
                       </table>
                    </div>
                </div>
          </div><br>
          
</div>     
<!-- End Deals  section -->          
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