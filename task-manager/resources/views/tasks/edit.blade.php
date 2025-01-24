@extends('layouts.app')

@section('content')
    <div class="task-cont">
        <h2>Edit Task</h2>
        <form action="{{ url('tasks/'.$task->id.'/update') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required>{{ $task->description }}</textarea>
            </div>
            <div>
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" value="{{ $task->due_date->format('Y-m-d') }}" required>
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status" class="select">
                    <option value="0" {{ $task->status == '0' ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ $task->status == '1' ? 'selected' : '' }}>In Progress</option>
                    <option value="2" {{ $task->status == '2' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            @include('form.form-error')
            <button type="submit">Update Task</button>
        </form>
    </div>
@endsection