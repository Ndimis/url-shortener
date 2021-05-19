@extends('layouts.base')

@section('content')
	<H1>Find Your sortener Url below : </H1>
	<a href="{{env('APP_URL')}}/{{ $shortener }}"> {{env('APP_URL')}}/{{ $shortener }} </a>
@stop