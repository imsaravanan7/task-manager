@extends('layouts.app')

@section('content')
    <div class="task-cont">
        <div class="cntnt-ttl">Task List</div>
        <div>
            <a href="{{ url('tasks/create') }}" class="btn btn-primary">Create New Task</a>
        </div>
        
        @if($tasks->isEmpty())
            <div class="alert alert-warning" role="alert">
                No tasks available.
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td class="desc">{{ $task->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
                            <td>{{ $task->status }}</td>
                            <td>
                                <a href="{{ url('tasks/'.$task->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ url('tasks/'.$task->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ url('tasks/'.$task->id.'/delete') }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection