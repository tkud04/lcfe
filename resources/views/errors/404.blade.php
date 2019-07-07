<?php
$user = null;
?>
@extends("layout")

@section('title',"Not Found")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Page Not Found</h4>
                  <p class="card-category">Couldn't find what you're looking for :(</p>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="">
                          {{ $exception->getMessage() }}
                        </div>
                      </div>
                    </div>                    
                    
                </div>
              </div>
            </div>           
          </div>
        </div>
      </div>
@stop