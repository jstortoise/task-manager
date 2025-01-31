@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Project</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Project Name:</label>
            <input type="text" id="name" name="name" value="{{ $project->name }}" required>
        </div>

        <button type="submit">Update Project</button>
    </form>
</div>
@endsection
