@extends('layout')

@section('title',"Get Started")

@section('banner')
<?php $bannerTitle = "Services"; ?>
@include("jssor")
@include("banner-2")
@stop

@section('content')
@include("services-content")
@include("ad-5")
@stop