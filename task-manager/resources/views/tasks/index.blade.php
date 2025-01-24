@extends('layouts.app')

@section('content')
    <div class="task-cont">
        <div class="cntnt-ttl">Task List</div>
        <div class="d-flex">
            <a href="{{ url('tasks/create') }}">Create New Task</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button>Logout</button>
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        @if($tasks->isEmpty())
            <div>
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
                        @php
                            if($task->status == 0) {
                                $status = 'Pending';
                            } elseif($task->status == 1) {
                                $status = 'In progress';
                            } else {
                                $status = 'Completed';
                            }
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td class="desc">{{ $task->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
                            <td>{{ $status }}</td>
                            <td>
                                <a href="{{ url('tasks/'.$task->id) }}">View</a>
                                <a href="{{ url('tasks/'.$task->id.'/edit') }}">Edit</a>
                                
                                <form action="{{ url('tasks/'.$task->id.'/delete') }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection