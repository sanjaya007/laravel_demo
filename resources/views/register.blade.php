@extends('layouts.layouts')

@push('title')
    <title>Register</title> 
@endpush

@section('main_page')
<div class="container mx-auto py-5">
    @php
        $counter = 1;
    @endphp
    <x-banner value="Register" :counter="$counter" />
    <form action="{{url('/')}}/register" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('name') }}">
            <span class="text-danger">
                @error('name')
                    {{ $message }}    
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('email') }}">
            <span class="text-danger">
                @error('email')
                    {{ $message }}    
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
            <span class="text-danger">
                @error('password')
                    {{ $message }}    
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirmPassword" class="form-control" placeholder="" aria-describedby="helpId">
            <span class="text-danger">
                @error('confirm_password')
                    {{ $message }}    
                @enderror
            </span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection