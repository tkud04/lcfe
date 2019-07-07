@extends("admin.layout")

@section('title',"Auctions")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Auctions</h4>
                  <p class="card-category"> View all Kloud Auctions </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table">
                      <thead class=" text-primary">
                                                <th>Deal</th>
                                                <th>Start Time</th>
                                                <th>Duration</th>
                                                <th>Total Bids</th>
                                                <th>Status</th>
                                                <td>Actions</td>
                      </thead>
                      <tbody>
                        @if($auctions != null && count($auctions) > 0)
                                              @foreach($auctions as $a)
                                              <?php
                                                $deal = $a['deal'];
                                                $bids = $a['bids'];
                                                $uu = url('cobra-auction').'?xf='.$a['id']; 
                                                
                                                $timeline = "";
                                                if($a['days'] > 0) $timeline .= $a['days']." days ";
                                                if($a['hours'] > 0) $timeline .= $a['hours']." hours ";
                                                if($a['minutes'] > 0) $timeline .= $a['minutes']." minutes";
                                              ?>
                                                 <tr>
                                                  <td>{{$deal['name']}}</td>
                                                  <td>{{$a['date']}}</td>
                                                  <td class="text-primary">{{$timeline}}</td>
                                                  <td>{{count($bids)}}</td>
                                                  <td><span class="text-primary">{{$a['status']}}</span></td>
                                                  <td>
                                                    <a class="btn btn-success" href="{{$uu}}">View</a>
                                                  </td>
                                                 </tr>
                                              @endforeach
                                            @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop