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
                            <option value="09:00:00">
                                09:00 - 10:00am
                            </option>
                            <option value="10:00:00">
                                10:00 - 11:00am
                            </option>
                            <option value="11:00:00">
                                11:00am - 12:00nn
                            </option>
                        </select>

                    </div>
                
                    <button class="btn btn-primary" type="submit">Book Appointment</button>
                </form>
            </div>

        </div>
    </div>

</div>
    
@include('layouts.footer')