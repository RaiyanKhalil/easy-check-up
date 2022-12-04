
@php                            
    $idvalue =$viewData['id']   ;                   
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            
                            <label for="fname" class="col-md-4 col-form-label text-md-end">First Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control " name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="contact" class="col-md-4 col-form-label text-md-end">Contact</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control " name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus>

                            </div>
                        </div>

                        @if( $idvalue == 2 )
                        <div class="row mb-3">
                            <label for="doctor_type_l" class="col-md-4 col-form-label text-md-end">Doctor Type</label>

                            <div class="dropdown col-md-6">
                                <select id="doctor_type" name="doctor_type" class="form-select" aria-label="Default select example">
                                    <option selected>Please select a type</option>
                                    <option value="doctor1">Doctor1</option>
                                    <option value="doctor1">Doctor2</option>
                                    <option value="doctor2">Doctor3</option>
                                    <option value="doctor3">Doctor4</option>
                                    <option value="doctor4">Doctor5</option>
                                    <option value="doctor5">Doctor6</option>
                                </select>
                            </div>

                            </div>  
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Clinic Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                <input type="hidden" id="userId" class="form-control" name="userId" value="{{$idvalue}}">
                            </div>
                        </div>
                        @endif
                        
                        
                        @if( $idvalue == 1 )
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                <input type="hidden" id="userId" class="form-control" name="userId" value="{{$idvalue}}">
                            </div>
                            </div>
                            @endif
                            
    <!--                    <div class="row justify-content-center">
                            <div class="col-md-4">
                                <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                            </div>
-->
                        
                       

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

      <!--                  <div class="row mb-3">
                            <label for="user_type" class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>

                            <div class="dropdown col-md-6">
                                <select id="user_type" name="user_type" class="form-select" aria-label="Default select example">
                                    <option selected>Please select a user type</option>
                                    <option value="patient">Patient</option>
                                    <option value="doctor">Doctor</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
