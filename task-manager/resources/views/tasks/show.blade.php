@extends('layouts.app')

@section('content')
    <div class="task-cont">
        <h2>Task Details</h2>
        <table class="table">
            <tr>
                <th>Title</th>
                <td>{{ $task->title }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $task->description }}</td>
            </tr>
            <tr>
                <th>Due Date</th>
                <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $task->status }}</td>
            </tr>
        </table>
        <a href="{{ url('tasks') }}" class="btn btn-secondary">Back to Task List</a>
    </div>
@endsection
