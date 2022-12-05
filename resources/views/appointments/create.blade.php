@php
    $d = $viewData['doctor'];
    $timeslots = array(
            '07:00:00' => '7:00 - 8:00 am',
            '08:00:00' => '8:00 - 9:00 am',
            '09:00:00' => '9:00 - 10:00 am',
            '10:00:00' => '10:00 - 11:00 am',
            '11:00:00' => '11:00 - 12:00 pm',
            '12:00:00' => '12:00 - 1:00 pm',
            '13:00:00' => '1:00 - 2:00 pm',
            '14:00:00' => '2:00 - 3:00 pm',
            '15:00:00' => '3:00 - 4:00 pm',
            '16:00:00' => '4:00 - 5:00 pm',
            '17:00:00' => '5:00 - 6:00 pm',
        );
@endphp
@include('layouts.header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col--9 row my-5">
            <h1 class="mb-5">
                @if(isset($viewData['appt']))
                    Update this appointment
                @else
                    Create new appointment
                @endif
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
                @if(isset($viewData['appt']))
                    <form action="{{route('appointment-update', $viewData['appt']->id)}}" method="POST">
                @else
                    <form action="{{route('appointment-create')}}" method="POST">
                @endif    
                    @csrf

                    <input type="hidden" name="user_id" value={{$viewData['user_id']}}>
                    <input type="hidden" name="doctor_id" value={{$viewData['doctor_id']}}>

                    <div class="form-group mb-3">
                        <label>
                            Booking Date
                        </label>

                        <input 
                            class="form-control" 
                            type="date" 
                            name="appointment_date" 
                            value="{{$viewData['date']}}"
                            min={{$viewData['today']}}
                        />

                    </div>

                    <div class="form-group mb-3">
                        <label>
                            Booking Time
                        </label>
                        <select class="form-control" name="appointment_time">
                            <option disabled selected hidden>Select a time slot</option>
                            @foreach($timeslots as $val => $label)
                                <option value="{{$val}}" {{$viewData['time']==$val ? 'selected': ''}}>
                                    {{$label}}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    @if(isset($viewData['appt']))
                        <button class="btn btn-primary" type="submit">Save Appointment</button>
                    @else
                        <button class="btn btn-primary" type="submit">Book Appointment</button>
                    @endif
                
                    
                </form>
            </div>

        </div>
    </div>

</div>
    
@include('layouts.footer')