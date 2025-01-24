@extends('layouts.app')

@section('content')
    <div class="task-cont">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Name : </label>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            <label for="password">Password : </label>
            <input type="password" name="password" placeholder="Password">
            @include('form.form-error')
            <button type="submit">Login</button>
            <div class="d-flex-cen">You don't have an account?<a href="{{ url('register') }}">Register</a></div>
        </form>        
    </div>
@endsection