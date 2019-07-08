@extends('layout')

@section('title',"Get Started")

@section('banner')
<?php $bannerTitle = "Register Farmers"; ?>
@include("jssor")
@include("banner-2")
@stop

@section('content')
@include("register-farmers-content")
@include("ad-5")
@stop