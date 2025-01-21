@extends('layouts.app')

@section('content')
    <div class="task-cont">
        <h2>Create New Task</h2>
        <form action="{{ url('tasks') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="input" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="input" required></textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="input" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="input">
                    <option value="0">Pending</option>
                    <option value="1">In Progress</option>
                    <option value="2">Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Task</button>
        </form>
    </div>
@endsection