@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Projects</h1>
    <table id="projects-list">
        <thead>
            <th>Project</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr data-id="{{ $project->id }}">
                    <td>{{ $project->name }}</td>
                    <td>
                        <a href="{{ route('projects.edit', $project) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('projects.create') }}">Create New Project</a>
    <a href="{{ route('tasks.index') }}">Go to Tasks</a>
</div>
@endsection
