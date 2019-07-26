@extends('layout')

@section('title',"Gallery")

@section('banner')
<?php $bannerTitle = "Gallery"; ?>
@include("jssor")
@include("banner-2")
@stop

@section('content')
@include("gallery-content")
@include("ad-3")
@stop