@extends('layouts.base')

@section('content')
    <H1>Rarcourcisseur d'Url</H1>
    

    <form action="/" method="POST">
        {{ csrf_field() }}
        <input type="text" name="url" placeholder="Please enter your original URL here!" value="{{old('url')}}"> 
        {!! $errors->first('url', '<p class="error-msg">:message</p>') !!}
        <!-- <input type="submit" value="Shorten URL"> -->
    </form>
@stop