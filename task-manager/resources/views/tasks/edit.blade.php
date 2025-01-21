@extends('layouts.app')

@section('content')
    <div class="task-cont">
        <h2>Edit Task</h2>
        <form action="{{ url('tasks/'.$task->id.'/update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="input" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="input" required>{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="input" value="{{ $task->due_date->format('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="select">
                    <option value="0" {{ $task->status == '0' ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ $task->status == '1' ? 'selected' : '' }}>In Progress</option>
                    <option value="2" {{ $task->status == '2' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Task</button>
        </form>
    </div>
@endsection