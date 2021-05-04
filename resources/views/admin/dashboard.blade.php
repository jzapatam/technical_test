@extends('adminlte::page')

@section('title', __('Dashboard'))

@section('content_header')
    <h1>{{ __('Dashboard') }}</h1>
@stop

@section('content')
    <p>{{ __('Welcome to admin panel.') }}</p>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
