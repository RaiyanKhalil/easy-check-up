
@extends('layouts.header')
@section('content')

<div class="container-fluid" style="width: 70%;">
    <div class="row">
        @foreach($docData as $d)
        <div class="col" style="margin-bottom: 22px;">
            <div class="card" style="width: 22rem;">
                <div class="card-body">
                    <h5 class="card-title">Dr. {{ $d->f_name . ' ' . $d->l_name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">MBBS in {{ $d->doc_type}}</h6>
                    <p class="card-text">Number: {{ $d->phn_num}} <br> Email: {{ $d->email}} <br> Clinic Address: {{ $d->doc_office_location}}</p>
                    <a href="#" class="card-link">Book Appointment</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.footer')

