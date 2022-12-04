@include('layouts.header')

<div class="card-body">
                    <form method="POST" action="{{ route('doctor-update',$viewData['doctor']->id)}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="fname" class="col-md-4 col-form-label text-md-end">First Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ $viewData['doctor']->f_name }}" required autocomplete="fname" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control " name="lname" value="{{ $viewData['doctor']->l_name }}" required autocomplete="lname" autofocus>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $viewData['doctor']->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="contactl" class="col-md-4 col-form-label text-md-end">Contact</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control " name="contact" value="{{ $viewData['doctor']->phn_num }}" required autocomplete="contact" autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="doctor_type_l" class="col-md-4 col-form-label text-md-end">Doctor Type</label>
                            
                            <div class="dropdown col-md-6">
                                <select id="doctor_type" name="doctor_type" class="form-select" aria-label="Default select example">
                                    <option>Please select a type</option>
                                    <option value="doctor1" {{ $viewData['doctor']->doc_type =='doctor1' ? 'selected' : '' }} >Doctor1</option>
                                    <option value="doctor2" {{ $viewData['doctor']->doc_type =='doctor2' ? 'selected' : '' }}>Doctor2</option>
                                    <option value="doctor3" {{ $viewData['doctor']->doc_type =='doctor3' ? 'selected' : '' }}>Doctor3</option>
                                    <option value="doctor4" {{ $viewData['doctor']->doc_type =='doctor4' ? 'selected' : '' }}>Doctor4</option>
                                    <option value="doctor5" {{ $viewData['doctor']->doc_type =='doctor5' ? 'selected' : '' }}>Doctor5</option>
                                    <option value="doctor6" {{ $viewData['doctor']->doc_type =='doctor6' ? 'selected' : '' }}>Doctor6</option>
                                </select>
                            </div>

                            </div>  
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Clinic Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $viewData['doctor']->doc_office_location }}" required autocomplete="address" autofocus>
                            </div>
                        </div>
                            
    <!--                    <div class="row justify-content-center">
                            <div class="col-md-4">
                                <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                            </div>
-->
                        
                       
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>


@include('layouts.footer')
