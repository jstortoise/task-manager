@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tasks</h1>
    <table>
        <thead>
            <th>Task</th>
            <th>Project</th>
            <th></th>
            <th></th>
        </thead>
        <tbody id="task-list">
            @foreach ($tasks as $task)
                <tr data-id="{{ $task->id }}" style="cursor:pointer;">
                    <td>{{ $task->name }}</td>
                    <td>
                        <select name="project_id" id="project_id" data-task-id="{{$task->id}}" class="project-select">
                            <option value="">Select a project</option>
                            @foreach ($projects as $project)
                                <option value="{{$project->id}}" {{ old('project_id', $task->project_id ?? '') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('tasks.create') }}">Create New Task</a>
    <a href="{{ route('projects.index') }}">Go to Projects</a>
</div>

<script>
    const el = document.getElementById('task-list');
    const sortable = new Sortable(el, {
        onEnd(evt) {
            let taskOrder = [];
            document.querySelectorAll('#task-list tr').forEach((task, index) => {
                taskOrder.push({
                    id: task.dataset.id,
                    priority: index + 1,
                });
            });

            fetch("{{ route('tasks.update-order') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ order: taskOrder })
            });
        },
    });

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.project-select').forEach(selectBox => {
            selectBox.addEventListener('change', function () {
                let taskId = this.getAttribute('data-task-id');
                let projectId = this.value;

                fetch(`/tasks/${taskId}`, { 
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ project_id: projectId })
                })
                .then(() => location.reload())
                .catch(error => console.error("Error:", error));
            });
        });
    });
</script>
@endsection
