{{-- resources/views/home.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @guest
                            <p>You are not logged in.</p>
                            <a href="{{ route('register') }}">Register</a>
                            <a href="{{ route('login') }}">Login</a>
                        @else
                            <p>You are logged in as {{ Auth::user()->name }}.</p>

                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
