@extends('layouts.app')

@section('content')
    <div class="task-cont">
        <h1>Welcome, {{ auth()->user()->name }}</h1>
        <div class="options d-flex">
            <div>
                <a href="{{ route('tasks.create') }}">Create new task</a>
                <a href="{{ url('tasks') }}" class="mt-10">View Existing tasks</a>
            </div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button>Logout</button>
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection