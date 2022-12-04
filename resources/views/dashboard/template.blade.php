@php
    $user = $viewData['user'];
    $isDoctor = $user->role_id == 2;
    // $roleStr = $isDoctor ? 'doctor' : 'patient';
@endphp

@include('layouts.header')
{{-- @include('.navigation') --}}

{{-- START OF DASHBOARD --}}
<div class="container">
    <div class="row">
        {{-- Start of patients area --}}
        <div class="col-md-8">
            <h1 class="mb-4">{{ $isDoctor ? 'Doctor' : 'Patient' }} Dashboard</h1>
            {{-- {{ $user }} --}}
            <div class="mb-4">
                <h3>Your Details</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong class="">Name: </strong> {{$user['fname']}} {{$user['lname']}} 
                    </li>
                    <li class="list-group-item">
                        <strong class="">Contact: </strong> {{$user['contact']}} 
                    </li>
                    <li class="list-group-item">
                        <strong class="">Email: </strong> {{$user['email']}} 
                    </li>
                    <li class="list-group-item">
                        <strong class="">Address: </strong> {{$user['address']}}
                    </li>
                </ul>
                <a href="#">Edit Profile</a>
            </div>
            <div class="mb-4">
                <h3>Your Appointments</h3>
                @include('appointments.table', ['appts'=>$viewData['appointments'], 'user' => $user, 'isDoctor' => $isDoctor] )
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')