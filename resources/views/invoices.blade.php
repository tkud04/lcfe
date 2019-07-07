@extends("layout")

@section('title',"Invoices")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading" style="color: #fbb710 !important; padding: 5px;">Invoices</h2>
            <hr class="my-4">
          </div>
</div>      

<!-- Start Deals  section -->  
<div class="row">
          <div class="col-lg-12 mx-auto p-b-10">
            <div class="card border-0">
                <div class="card-title">
                   <h4>My Invoices </h4>                  
                </div>
                <div class="card-body">
                	<div class="table-responsive m-t-40">
                	   <table id="invoices-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                	     <thead>
                                            <tr>
                                                <th>Invoice #</th>
                                                <th>Total</th>
                                                <th>Invoice Date</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<tr>
                                                <td>KINV45952468</td>
                                                <td>&#8358;47,000.00</td>
                                                <td>26 May 2019</td>
                                                <td>26 May 2019</td>
                                                <td><span class="badge badge-danger">UNPAID</span></td>
                                                <td><a class="btn btn-lg btn-primary" href="{{url('invoice'}}">View</a></td>
                                            </tr>
                                        </tbody>
                       </table>
                    </div>
                </div>
          </div><br>
          
</div>     
<!-- End Deals  section -->    

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