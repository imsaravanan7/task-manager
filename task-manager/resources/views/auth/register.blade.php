@extends('layouts.app')

@section('content')
    <div class="task-cont">
        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>
            @include('form.form-error')
            <button type="submit">Register</button>
            <div class="d-flex-cen">Already have an account?<a href="{{ url('login') }}">Login</a></div>
        </form>
    </div>
@endsection