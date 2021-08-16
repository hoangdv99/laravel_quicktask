@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center add-btn">
        <div class="col-md-10">
            <div class="tasks-header">
                <h3>{{ $project->name }}</h3>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTaskModal">Add new task</button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-2">Task ID</th>
                        <th class="col-6">Task</th>
                        <th class="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->name }}</td>
                            <td style="display: flex;">
                                <button type="button" class="btn btn-warning edit-task-btn" data-toggle="modal" data-target="#editTaskModal" data-id="{{ $task->id }}" data-name="{{ $task->name }}">Edit</button>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="delete-btn">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger delete">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <input type="text" name="project_id" class="id-input" value="{{ $project->id }}" style="display: none;">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter task name" required>
                            </div>
                            <button class="btn btn-primary add-btn-submit" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('tasks.update', 'edit') }}">
                            @csrf
                            @method('PUT')
                            <input type="text" name="id" class="id-input" id="id_u" style="display: none;">
                            <input type="text" name="project_id" class="id-input" value="{{ $project->id }}" style="display: none;">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="task_name_u" placeholder="Enter task name" required>
                            </div>
                            <button class="btn btn-primary edit-task-submit-btn" type="submit">Done</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
