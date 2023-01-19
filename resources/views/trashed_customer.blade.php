@extends('layouts.layouts')

@push('title')
    <title>View Customer</title>
@endpush

@php
    function genderMaping($value)
    {
        if ($value == 'M') {
            return 'Male';
        } elseif ($value == 'F') {
            return 'Female';
        } else {
            return 'Others';
        }
    }
@endphp

@section('main_page')
    <div class="container mx-auto py-5">
        <div class="pb-5 text-center text-danger">
            <h1>Trashed Customer</h1>
        </div>
        <div class="flex-css-row-end pb-3">
            <a class="btn btn-primary mr-2" href="{{ url('/customer/create') }}" role="button">Add Customer</a>
            <a class="btn btn-warning mr-2" href="{{ url('/customer/view') }}" role="button">View Customer</a>
            <a class="btn btn-danger" href="{{ url('/customer/trash') }}" role="button">Trashed Customer</a>
        </div>
        <div class="table-wrapper flex-css">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->dob ?? 'N/A' }}</td>
                            <td>{{ genderMaping($customer->gender) }}</td>
                            <td>{{ $customer->address ?? 'N/A' }}</td>
                            <td>{{ $customer->state ?? 'N/A' }}</td>
                            <td>{{ $customer->country ?? 'N/A' }}</td>
                            <td>{!! $customer->status == 1
                                ? '<span class="badge badge-success">Active</span>'
                                : '<span class="badge badge-danger">Inactive</span>' !!}</td>
                            <td>
                                <a href="{{ route('customer_restore', ['id' => $customer->id]) }}">
                                    <button class="btn btn-success">Restore</button>
                                </a>
                                <a href="{{ url('/customer/hardDelete') }}/{{ $customer->id }}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
