@php
if(Auth::user()) $isDoctor = Auth::user()->role_id == 2;
@endphp


@extends('layouts.header')
@section('content')


<div class="container-fluid" style="width: 70%;">


    <div id="map" style="width: 100%; height: 400px;"></div>

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


    const v_data = {!!json_encode($users) !!}



    console.log(v_data)
     var attribution = new ol.control.Attribution({
        collapsible: false
    });

    var map = new ol.Map({
        controls: ol.control.defaults({attribution: false}).extend([attribution]),
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM({
                    url: 'https://tile.openstreetmap.be/osmbe/{z}/{x}/{y}.png',
                    attributions: [ ol.source.OSM.ATTRIBUTION, 'Tiles courtesy of <a href="https://geo6.be/">GEO-6</a>' ],
                    maxZoom: 18
                })
            })
        ],
        target: 'map',
        view: new ol.View({
            center: ol.proj.fromLonLat([4.35247, 50.84673]),
            maxZoom: 18,
            zoom: 12
        })
    });

    var layer2 = new ol.layer.Vector({
     source: new ol.source.Vector({
            features: [
                new ol.Feature({
                    geometry: new ol.geom.Point(ol.proj.fromLonLat([4.35247, 50.94673]))
                })
            ]
        })
    });
    map.addLayer(layer2);


    var layer = new ol.layer.Vector({
     source: new ol.source.Vector({
            features: [
                new ol.Feature({
                    geometry: new ol.geom.Point(ol.proj.fromLonLat([4.35247, 50.84673]))
                })
            ]
        })
    });
    map.addLayer(layer);
    // map.addLayer(layer2);


</script>
@endsection
@extends('layouts.footer')

