@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Task Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="priority">Priority:</label>
            <input type="number" id="priority" name="priority" required>
        </div>

        <button type="submit">Create Task</button>
    </form>
</div>
@endsection
