@extends('admin.layout')

@section('title',"Members")

@section('content')
<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Members</h4>
                                <p class="category">A list of all registered members on the platform</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Email</th>
                                    	<th>Phone</th>
                                    	<th>Status</th>
                                    	<th>Actions</th>
                                    </thead>
                                    <tbody>
									<?php $u = url('admin-member');?>
                                        <tr>
                                        	<td>1</td>
                                        	<td>Tayo Akinola</td>
                                        	<td>takinola@gmail.com</td>
                                        	<td>080453285432</td>
                                        	<td class="text-primary">Active</td>
                                        	<td><a class="btn btn-info btn-fill" href="{{$u}}">View</a></td>
                                        </tr>
                                        <tr>
                                        	<td>2</td>
                                        	<td>Tayo Akinola</td>
                                        	<td>takinola@gmail.com</td>
                                        	<td>080453285432</td>
                                        	<td class="text-primary">Active</td>
                                        	<td><a class="btn btn-info btn-fill" href="{{$u}}">View</a></td>
                                        </tr>
                                        <tr>
                                        	<td>3</td>
											<td>Tayo Akinola</td>
                                        	<td>takinola@gmail.com</td>
                                        	<td>080453285432</td>
                                        	<td class="text-primary">Active</td>
                                        	<td><a class="btn btn-info btn-fill" href="{{$u}}">View</a></td>
											</tr>
                                        <tr>
                                        	<td>4</td>
                                            <td>Tayo Akinola</td>
                                        	<td>takinola@gmail.com</td>
                                        	<td>080453285432</td>
                                        	<td class="text-primary">Active</td>
                                        	<td><a class="btn btn-info btn-fill" href="{{$u}}">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
@stop