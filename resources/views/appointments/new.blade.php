@extends('layouts.app')

@php

        // $url = 'http://192.168.0.62:1337';
        // $collection_name = 'api/doctors';
        // $request_url = $url . '/' . $collection_name;
        
        // $curl = curl_init($request_url);
        // print_r(json_encode($curl[0], true)) ;



@endphp

@section('content')
    @include('appointments.create')
@endsection