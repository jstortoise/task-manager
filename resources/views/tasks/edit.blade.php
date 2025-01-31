@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Task Name:</label>
            <input type="text" id="name" name="name" value="{{ $task->name }}" required>
        </div>

        <div>
            <label for="priority">Priority:</label>
            <input type="number" id="priority" name="priority" value="{{ $task->priority }}" required>
        </div>

        <button type="submit">Update Task</button>
    </form>
</div>
@endsection
