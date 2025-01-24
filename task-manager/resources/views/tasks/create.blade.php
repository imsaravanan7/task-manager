@extends('layouts.app')

@section('content')
    <div class="task-cont">
        <h2>Create New Task</h2>
        <form action="{{ url('tasks') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" required>{{ old('description') }}</textarea>
            </div>
            <div>
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" required>
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>In Progress</option>
                    <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            @include('form.form-error')
            <button type="submit">Create Task</button>
        </form>
    </div>
@endsection