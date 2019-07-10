@extends('layout')

@section('title',"Success")

@section('banner')
<?php $bannerTitle = "Payment Successful!"; ?>
@include("jssor")
@include("banner-2")
@stop

@section('content')
@include("paid-content")
@include("ad-5")
@stop