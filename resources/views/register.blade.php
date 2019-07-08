@extends('layout')

@section('title',"Get Started")

@section('banner')
<?php $bannerTitle = "Get Started"; ?>
@include("jssor")
@include("banner-2")
@stop

@section('content')
@include("register-content")
@include("ad-5")
@stop