@extends("admin.layout")

@section('title',"Dashboard")

@section('content')
<?php
$totalUsers = $adminStats['totalUsers'];
		$totalSales= $adminStats['totalSales'];
		$totalWithdrawals = $adminStats['totalWithdrawals'];
		$totalDeals = $adminStats['totalDeals'];
		$totalUsersActive = $adminStats['totalUsersActive'];
		$totalOrders = $adminStats['totalOrders'];
		$totalOrdersPending = $adminStats['totalOrdersPending'];
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">payment</i>
                  </div>
                  <p class="card-category">Deals</p>
                  <h3 class="card-title">{{$totalDeals}}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="{{url('cobra-deals')}}">View all deals</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Withdrawals Pending</p>
                  <h3 class="card-title">{{$totalWithdrawals}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> 
                    <a href="{{url('cobra-withdrawals')}}">View all withdrawals</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">receipt</i>
                  </div>
                  <p class="card-category">Orders</p>
                  <h3 class="card-title">{{$totalOrdersPending}}/{{$totalOrders}}
                    <small>PENDING</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> 
                    <a href="{{url('cobra-orders')}}">View all orders</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <p class="card-category">Users</p>
                  <h3 class="card-title">{{$totalUsersActive}}/{{$totalUsers}}
                    <small>ACTIVE</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> 
                    <a href="{{url('cobra-users')}}">View all users</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Weekly Sales</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 35% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Email Subscriptions</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">User Activity</h4>
                  <p class="card-category">Weekly Stats</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 2 days ago
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Recent Orders</h4>
                  <p class="card-category">as at <?=date("jS F, Y")?> <a class="btn btn-secondary text-warning pull-right" href="{{url('cobra-orders')}}">View more</a></p>                 
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>
                          S/N
                        </th>
                        <th>
                          User
                        </th>
                        <th>
                          Order #
                        </th>
                        <th>
                          Amount
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                    </thead>
                    <tbody>
                    @if($adminRecentOrders != null && count($adminRecentOrders) > 0)
                     @foreach($adminRecentOrders as $o)
                      <tr>
                          <td>
                            {{$o['id']}}
                          </td>
                          <td>
                            {{$o['email']}}
                          </td>
                          <td>
                            {{$o['number']}}
                          </td>
                          
                          <td class="text-primary">
                           &#8358;{{number_format($o['total'],2)}}
                          </td>
                          <td class="text-warning">
                           {{$o['status']}} 
                          </td>
                        
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Recent Transactions</h4>
                  <p class="card-category">as at <?=date("jS F, Y")?> <a class="btn btn-secondary text-warning pull-right" href="{{url('cobra-transactions')}}">View more</a></p>                 
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>User</th>
                                                <th>Type</th>
                                                <th>Description</th>
                                                <th>Amount (&#8358;)</th>
                    </thead>
                    <tbody>
                      	@if($adminRecentTransactions != null && count($adminRecentTransactions) > 0)
                                              @foreach($adminRecentTransactions as $t)
                                                 <tr>
                                                 <td>{!! $t['email'] !!}</td>
                                                  <td><span class="badge {{$t['badgeClass']}} text-uppercase">{{$t['type']}}</span></td>
                                                  <td>{!! $t['description'] !!}</td>
                                                  <td>&#8358;{{number_format($t['amount'],2)}}</td>
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
@stop