@extends("layout")

@section('title',"Admin Center - Transactions")

@section('styles')
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="lib/datatables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatables/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatables/css/buttons.dataTables.min.css">
@stop

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading">Transactions</h2>
            <hr class="my-4">
          </div>
</div>         
 
<!-- Start Transactions section -->  
<div class="row">
          <div class="col-lg-12 mx-auto p-b-10">
            <div class="card">
                <div class="card-title">
                   <h4>All Transactions </h4>                  
                </div>
                <div class="card-body">
                	<div class="table-responsive m-t-40">
                	   <table id="admin-transactions-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                	     <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Type</th>
                                                <th>Activity</th>
                                                <th>Amount</th>                                
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if(count($transactions)  > 0)
                                              <tr>
                                               @foreach($transactions as $t)
                                                 <td>{{$t['user']}}</td>
                                                 <td>{{$t['type']}}</td>
                                                 <td>{{$t['activity']}}</td>
                                                 <td>{{$u['amount']}}</td>
                                                 <td>{{$u['date']}}</td>
                                               @endforeach
                                              </tr>
                                            @endif
                                        </tbody>
                       </table>
                    </div>
                </div>
          </div><br>
          
</div>     
<!-- End Transactions section -->          
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