@extends("layout")

@section('title',"Welcome")

@section('slider')
 @include("slider")

@stop

@section('content')
 @include('features')
 @include('cta-1')
 @include('cta-2')
 @include('index-services')
@stop