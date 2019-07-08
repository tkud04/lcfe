@extends('layout')

@section('title',"Get Started")

@section('banner')
<?php $bannerTitle = "Contact Us"; ?>
@include("jssor")
@include("banner-2")
@stop

@section('content')
@include("mission-content")
@include("ad")
@stop