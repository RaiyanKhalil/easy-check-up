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
            <strong class="text-center">Find a doctor by type</strong>
            <div class="col-8 col-md-5">
                <input class="form-control" type="text" name="search" value="{{ request('search') }}" />
            </div> 
            <div class="col-4 col-md-3">
                <button class="btn btn-primary w-100" type="submit">Search</button>
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

</div>

@endsection
@extends('layouts.footer')

