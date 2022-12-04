
@include('layouts.header')
{{-- @include('.navigation') --}}

{{-- START OF DASHBOARD --}}
<div class="container">
    <div class="row">
        {{-- Start of patients area --}}
        <div class="col-md-8">
            <h1>Dashboard</h1>
            <h2>Patient Details</h2>
            <div>
                Your details
            </div>
            <h2>
                Create Appointment
            </h2>
            
            {{-- @include('appointments.create') --}}

            <h2>Your Appointments</h2>
            <div>
                @include('appointments.table', ['appts'=>$renderData['appointments']] )
            </div>

        </div>
    </div>
</div>





@include('layouts.footer')