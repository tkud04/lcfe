@extends('layout')

@section('title',"About Us")

@section('banner')
<?php $bannerTitle = "About Us"; ?>
@include("jssor")
@include("banner-2")
@stop

@section('content')
@include("about-content")
@include("ad-2")
@stop