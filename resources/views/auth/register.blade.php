
@php                            
    $idvalue =$viewData['id'] ;                   
    $specialties = array(
            'Surgery',
            'Internal medicine',
            'Cardiology',
            'Family medicine',
            'Emergency medicine',
            'Pediatrics',
            'Audiology',
            'Orthopedics',
            'Neurosurgery',
        );
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body py-4">
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
                                    <option value="" disabled selected hidden>Please select a type</option>
                                    @foreach($specialties as $s)
                                        <option value="{{$s}}">{{$s}}</option>
                                    @endforeach
                                </select>
                            </div>

                            </div>  
                        </div>
                        <div class="row mb-3">
                            <label for="addressl" class="col-md-4 col-form-label text-md-end">Street Address</label>

                            <div class="col-md-6">
                                  <input
                                    type="text" class="form-control"
                                    name="street" value="{{ old('street') }}" 
                                    placeholder="12 Some St., 9 Ave" 
                                    required 
                                    autocomplete="street-address" 
                                    autofocus
                                  >
                                <input type="hidden" id="userId" class="form-control" name="userId" value="{{$idvalue}}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="cityL" class="col-md-4 col-form-label text-md-end">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="Vancouver">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="provinceL" class="col-md-4 col-form-label text-md-end">Province</label>

                            <div class="col-md-6">
                                <input id="province" type="text" class="form-control" name="province" value="British Columbia" required autocomplete="province" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zipcode" class="col-md-4 col-form-label text-md-end">Zip Code</label>

                            <div class="col-md-6">
                                <input id="zipcodel2" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" placeholder="V2B 13C" required autofocus>
                            </div>
                        </div>
                        @endif
                        
                        
                        @if( $idvalue == 1 )
                        <div class="row mb-3">
                            <label for="addressl" class="col-md-4 col-form-label text-md-end">Street Address</label>

                            <div class="col-md-6">
                                  <input
                                    type="text" class="form-control"
                                    name="street" value="{{ old('street') }}" 
                                    placeholder="12 Some St., 9 Ave" 
                                    required 
                                    autocomplete="street-address" 
                                    autofocus
                                  >
                                <input type="hidden" id="userId" class="form-control" name="userId" value="{{$idvalue}}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="cityL" class="col-md-4 col-form-label text-md-end">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="Vancouver">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="provinceL" class="col-md-4 col-form-label text-md-end">Province</label>

                            <div class="col-md-6">
                                <input id="province" type="text" class="form-control" name="province" value="British Columbia" required autocomplete="province" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zipcode" class="col-md-4 col-form-label text-md-end">Zip Code</label>

                            <div class="col-md-6">
                                <input id="zipcodel2" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" placeholder="V2B 13C" required autofocus>
                            </div>
                        </div>

                            @endif
                                           

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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mb-3">
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
