@extends('layouts.app')

@section('content')
    @php
        if($task->status == 0) {
            $status = 'Pending';
        } elseif($task->status == 1) {
            $status = 'In progress';
        } else {
            $status = 'Completed';
        }
    @endphp
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
                <td>{{ $status }}</td>
            </tr>
        </table>
        <a href="{{ url('tasks') }}">Back to Task List</a>
    </div>
@endsection
