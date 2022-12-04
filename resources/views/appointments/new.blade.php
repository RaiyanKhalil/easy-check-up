@php
    $d = $viewData['doctor'];
@endphp
@include('layouts.header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 row my-5">
            <h1 class="mb-5">
                Create new appointments
            </h1>
            <div class="col-md-4">
                <h3>
                    Doctor details
                </h3>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dr. {{ $d->f_name . ' ' . $d->l_name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">MBBS in {{ $d->doc_type}}</h6>
                        <ul class="p-0">
                            <li class="list-unstyled ml-0">Number: {{ $d->phn_num}}</li>
                            <li class="list-unstyled ml-0">Email: {{ $d->email}}</li>
                            <li class="list-unstyled ml-0">Clinic Address: {{ $d->doc_office_location}}</li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <h3>
                    Set appointment details
                </h3>
                <form action="{{route('appointment-create')}}" method="POST">
                    @csrf

                    <input type="hidden" name="user_id" value={{$viewData['user_id']}}>
                    <input type="hidden" name="doctor_id" value={{$viewData['doctor_id']}}>

                    <div class="form-group mb-3">
                        <label>
                            Booking Date
                        </label>

                        <input class="form-control" type="date" name="appointment_date" value="{{$viewData['tomorrow']}}"/>

                    </div>

                    <div class="form-group mb-3">
                        <label>
                            Booking Time
                        </label>
                        <select class="form-control" name="appointment_time">
                            <option disabled selected hidden>Select a time slot</option>
                            @foreach($viewData['timeslots'] as $val => $label)
                                <option value="{{$val}}">
                                    {{$label}}
                                </option>
                            @endforeach
                        </select>

                    </div>
                
                    <button class="btn btn-primary" type="submit">Book Appointment</button>
                </form>
            </div>

        </div>
    </div>

</div>
    
@include('layouts.footer')