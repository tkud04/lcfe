@extends('layout')

@section('title',"Mission / Vision")

@section('banner')
<?php $bannerTitle = "Mission / Vision"; ?>
@include("jssor")
@include("banner-2")
@stop

@section('content')
@include("mission-content")
@include("ad-2")
@stop