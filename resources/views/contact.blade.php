@extends('layout')

@section('title',"Contact Us")

@section('banner')
<?php $bannerTitle = "Contact Us"; ?>
@include("jssor")
@include("banner-2")
@stop

@section('content')
@include("contact-content")
@include("ad")
@stop