@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/customer.css', 'statics/assets') }}">
@stop

@section('content')
    @include('customer.list.components.content')
@stop

@section('script')
@stop
