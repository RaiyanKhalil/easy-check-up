@php
if(Auth::user()) $isDoctor = Auth::user()->role_id == 2;
@endphp

@extends('layouts.header')
@section('content')

<div class="super-wrapper">
<div class="container-fluid map-holder p-0">
    <div id="map" class="" style="width:100%; height:600px;"></div>
</div>

<div class="container">
    <form action="{{ route('search') }}" method="GET">
        <div class="row form-group my-4 gx-1 justify-content-center">
            <strong class="text-center">Find a doctor by type, name or location</strong>
            <div class="col-8 col-md-5">
                <input class="form-control" type="text" name="search" value="{{ request('search') }}" />
            </div> 
            <div class="col-4 col-md-3">
                <button class="btn btn-success w-100" type="submit">Search</button>
            </div>
            
        </div>
    </form>

    <div class="row">
        <div class="col-12">
            {{-- <h3 class="">Select a doctors</h3> --}}
        </div>

        @forelse($users as $d)
            <div class="col-md-4">
                <div class="card mb-4" >
                    <div class="card-header bg-transparent">
                        <h5 class="card-title text-primary mb-0">Dr. {{ $d->f_name . ' ' . $d->l_name}}</h5>
                    </div>
                    <div class="card-body">
                        
                        <h6 class="card-subtitle mb-2 text-muted">MBBS in {{ $d->doc_type}}</h6>

                        <ul class="p-0">
                            <li class="list-unstyled ml-0"><strong>Number:</strong> {{ $d->phn_num}}</li>
                            <li class="list-unstyled ml-0"><strong>Email:</strong> {{ $d->email}}</li>
                            <li class="list-unstyled ml-0"><strong>Clinic Address:</strong> {{ $d->doc_office_location}}</li>
                        </ul>
                        
                        @if(isset($d->id))
                        
                            @auth
                                @if(!$isDoctor)
                                <a href="{{route('appointment-new', $d->id)}}" class="btn btn-primary">Book Appointment</a>    
                                @endif
                            @endauth
                                @guest
                                <a href="{{route('login', $d->id)}}" class="btn btn-warning btn-small">Login to book</a>    
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

    const v_data = {!!json_encode($users) !!};
    
    var map = L.map('map').setView([v_data ? v_data[0].doc_lat : 49.2220896, v_data ? v_data[0].doc_long : 49.2220896], 12);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    
    v_data.forEach((element, index) => {
        // console.log(element.f_name)    
        var marker = L.marker([element.doc_lat, element.doc_long]).addTo(map);

    });

    
 </script>

</div>

@endsection
@extends('layouts.footer')

