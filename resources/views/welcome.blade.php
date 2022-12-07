@php
if(Auth::user()) $isDoctor = Auth::user()->role_id == 2;
@endphp


@extends('layouts.header')
@section('content')



<div class="container-fluid" style="width: 70%;">


    <div id ="map" style="width:100%; height:600px;"></div>

    <br>



    
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" value="{{ request('search') }}" />
        <button type="submit">Search</button>
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



<script>

    var map = L.map('map').setView([49.2220896, -122.9677621], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const v_data = {!!json_encode($users) !!};
    
    v_data.forEach((element, index) => {
        // console.log(element.f_name)
        
        var marker = L.marker([element.doc_lat, element.doc_long]).addTo(map);

    });
 </script>

@endsection
@extends('layouts.footer')

