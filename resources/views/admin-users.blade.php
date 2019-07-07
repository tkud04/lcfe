@extends("layout")

@section('title',"Admin Center - Users")

@section('styles')
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="lib/datatables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatables/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatables/css/buttons.dataTables.min.css">
@stop

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading">Users</h2>
            <hr class="my-4">
          </div>
</div>         
 
<!-- Start Users  section -->  
<div class="row">
          <div class="col-lg-12 mx-auto p-b-10">
            <div class="card">
                <div class="card-title">
                   <h4>All Users </h4>                  
                </div>
                <div class="card-body">
                	<div class="table-responsive m-t-40">
                	   <table id="admin-users-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                	     <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Wallet Balance</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Date Joined</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if(count($users)  > 0)
                                               @foreach($users as $u)
                                                <tr>                                           
                                                 <td>{{$u['fname']." ".$u['lname']}}</td>
                                                 <td>{{$u['phone']}}</td>
                                                 <td>{{$u['email']}}</td>
                                                 <td>{{$u['balance']}}</td>
                                                 <td>{{$u['role']}}</td>
                                                 <td>{{$u['status']}}</td>
                                                 <td>{{$u['date']}}</td>
                                                 <td>
                                                 	<?php
                                                       $egg = $u['id']; $au = ""; $at = ""; $clax = "";
                                                       
                                                       if($u['status'] == "ok")
                                                       {
                                                       	$au = url('cobra-suspend-user');
                                                           $at = "Deactivate";
                                                           $clax = "btn-danger";
                                                       } 
                                                       else
                                                       {
                                                       	$au = url('cobra-activate-user');
                                                           $at = "Activate";
                                                           $clax = "btn-primary";
                                                       }
                                                       
                                                       $au .= "?egg=".$egg;
                                                     ?>
                                                 	<a href="{{$au}}" class="btn {{$clax}}" role="button">{{$at}}</a>
                                                 </td>
                                                 </tr>                                              
                                               @endforeach
                                            @endif
                                        </tbody>
                       </table>
                    </div>
                </div>
          </div><br>
          
</div>     
<!-- End Users  section -->          
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