@extends('layouts.layouts')
@include('layouts.inner_layouts.nav')

@push('title')
  <title>Demo</title>    
@endpush

@section('main_page')
<div class="demo-box">
        @yield('nav')
        <h1>
            Welcome, {{ $name ?? 'Guest' }} <br>
            @isset($id)
                <h3> You are logged in </h3>
            @endisset
        </h1>

        {{ $html_test }}
        {!! $html_test !!}

        @if ($id % 2 === 0)
            {{ "ID is even" }}
          @else
            {{ "ID is odd" }}
        @endif

        <br>

        @for ($i = 1; $i <= 10; $i++)
            {{ $i }} <br>
        @endfor

        @php
            $arr = ['a', 'b', 'c', 'd', 'e'];
        @endphp

        @foreach ($arr as $value)
            {{ $value }} <br>
        @endforeach
</div>
@endsection
