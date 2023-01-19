@extends('layouts.layouts')

@push('title')
    <title>Customer Form</title>
@endpush

@php
    function checkGender($customer, $value)
    {
        if ($customer->gender === $value) {
            return 'checked';
        }
    }
@endphp

@section('main_page')
    <div class="pt-5 text-center text-primary">
        <h1>Create Customer</h1>
    </div>

    <div class="container flex-css-row-end pt-4">
        <a class="btn btn-primary mr-2" href="{{ url('/customer/create') }}" role="button">Add Customer</a>
        <a class="btn btn-warning mr-2" href="{{ url('/customer/view') }}" role="button">View Customer</a>
        <a class="btn btn-danger" href="{{ url('/customer/trash') }}" role="button">Trashed Customer</a>
    </div>

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
                <input type="submit" name="" value="Login" /><br />
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Products</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading"> {{ $type === 'create' ? 'Add' : 'Update' }} Customer</h3>
                        <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name *"
                                            value="{{ $type === 'create' ? old('name') : $customer->name }}" /> <span
                                            class="error-text text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="dob" class="form-control"
                                            placeholder="Date of birth *"
                                            value="{{ $type === 'create' ? old('dob') : $customer->dob }}" />
                                        <span class="error-text text-danger">
                                            @error('dob')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control" placeholder="Address *"
                                            value="{{ $type === 'create' ? old('address') : $customer->address }}" />
                                        <span class="error-text text-danger">
                                            @error('address')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="country" class="form-control" placeholder="Country *"
                                            value="{{ $type === 'create' ? old('country') : $customer->country }}" />
                                        <span class="error-text text-danger">
                                            @error('country')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="file"
                                            value="{{ $type === 'create' ? '' : $customer->file }}">
                                        <span>
                                            {{ $type === 'create' ? '' : $customer->file }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email *"
                                            value="{{ $type === 'create' ? old('email') : $customer->email }}" />
                                        <span class="error-text text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group {{ $type === 'edit' ? 'hidden' : '' }} ">
                                        <input type="password" name="password" class="form-control" placeholder="Password *"
                                            value="" />
                                        <span class="error-text text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="state" class="form-control" placeholder="State *"
                                            value="{{ $type === 'create' ? old('state') : $customer->state }}" />
                                        <span class="error-text text-danger">
                                            @error('state')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="M"
                                                    {{ $type === 'create' ? 'checked' : checkGender($customer, 'M') }}>
                                                <span> Male </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="F"
                                                    {{ $type === 'edit' ? checkGender($customer, 'F') : '' }}>
                                                <span>Female </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="O"
                                                    {{ $type === 'edit' ? checkGender($customer, 'O') : '' }}>
                                                <span>Others </span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="submit" class="btnRegister"
                                        value="{{ $type === 'create' ? 'Register' : 'Update' }}">
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3  class="register-heading">Apply as a Hirer</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
                                    <option>What is your Birthdate?</option>
                                    <option>What is Your old Phone Number</option>
                                    <option>What is your Pet Name?</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="`Answer *" value="" />
                            </div>
                            <input type="submit" class="btnRegister"  value="Register"/>
                        </div>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>

    </div>
@endsection
