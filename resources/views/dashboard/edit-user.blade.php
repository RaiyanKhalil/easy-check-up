

@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Profile</div>
            <div class="card-body py-4">
                <form method="POST" action="{{ route('user-update') }}">
                    @csrf
                    <div class="row mb-3">
                        
                        <label class="col-md-4 col-form-label text-md-end">First Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="fname" value="{{ Auth::user()->fname }}" required autocomplete="fname" autofocus>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Last Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control " name="lname" value="{{ Auth::user()->lname }}" required autocomplete="lname" autofocus>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

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
                            <input id="contact" type="text" class="form-control " name="contact" value="{{ Auth::user()->contact }}" required autocomplete="contact" autofocus>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" required autocomplete="address" autofocus>
                            <input type="hidden" id="userId" class="form-control" name="userId" value="{{ Auth::user()->id}}">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary mb-3">
                                Edit
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
