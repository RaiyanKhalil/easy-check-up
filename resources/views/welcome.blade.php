@php
if(Auth::user()) $isDoctor = Auth::user()->role_id == 2;
@endphp


@extends('layouts.header')
@section('content')


<div class="container-fluid" style="width: 70%;">

    <form >
    <input
        type="search"
        class="form-control"
        placeholder="Find user here"
        name="search"
        value="{{ request('search') }}"
        onkeyup="myFunction()"
    >
    </form>
    
    <div class="row">
        @forelse($users as $d)
            <div class="col" style="margin-bottom: 22px;">
                <div class="card" style="width: 22rem;">
                    <div class="card-body">
                        <h5 class="card-title">Dr. {{ $d->f_name . ' ' . $d->l_name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">MBBS in {{ $d->doc_type}}</h6>
                        <p class="card-text">Number: {{ $d->phn_num}} <br> Email: {{ $d->email}} <br> Clinic Address: {{ $d->doc_office_location}}</p>
                        @if(isset($d->id))
                        @auth
                            @if(!$isDoctor)
                            <a href="{{route('appointment-new', $d->id)}}" class="card-link">Book Appointment</a>    
                            @endif
                        @endauth
                        @guest
                        <a href="{{route('login', $d->id)}}" class="card-link">Login to book</a>    
                        @endguest
                    @endif
                        
                    </div>
                </div>
            </div>
        @empty
            <li class="list-group-item list-group-item-danger">User Not Found.</li>
        @endforelse
    </div>
</div>
@endsection
@extends('layouts.footer')

