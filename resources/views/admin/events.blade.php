@extends('admin.layout')

@section('title',"Events")

@section('content')
<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Events</h4>
								<a class="btn btn-info btn-fill" href="#">Add Event</a>
                                <p class="category">A list of all events on the platform</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Event</th>
                                    	<th>Date</th>
                                    	<th>Status</th>
                                    	<th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>1</td>
                                        	<td>Survey 1</td>
                                        	<td>38</td>
                                        	<td class="text-primary">Active</td>
                                        	<td><a class="btn btn-info btn-fill" href="#">View</a></td>
                                        </tr>
                                        <tr>
                                        	<td>2</td>
                                        	<td>Survey 2</td>
                                        	<td>0</td>
                                        	<td class="text-warning">Pending</td>
                                        	<td><a class="btn btn-info btn-fill" href="#">View</a></td>
                                        </tr>
                                        <tr>
                                        	<td>3</td>
                                        	<td>Survey 3</td>
                                        	<td>38</td>
                                        	<td class="text-danger">Ended</td>
                                        	<td><a class="btn btn-info btn-fill" href="#">View</a></td>
                                        </tr>
                                        <tr>
                                        	<td>4</td>
                                        	<td>Survey 4</td>
                                        	<td>345</td>
                                        	<td class="text-danger">Ended</td>
                                        	<td><a class="btn btn-info btn-fill" href="#">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
@stop