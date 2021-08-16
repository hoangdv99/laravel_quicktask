@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center add-btn">
        <div class="col-md-10">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="tasks-header">
                <h3>{{ $project->name }}</h3>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTaskModal">{{ __('index.add_task') }}</button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-2">{{ __('index.task_id') }}</th>
                        <th class="col-6">{{ __('index.task_name') }}</th>
                        <th class="col-2">{{ __('index.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->name }}</td>
                            <td style="display: flex;">
                                <button type="button" class="btn btn-warning edit-task-btn" data-toggle="modal" data-target="#editTaskModal" data-id="{{ $task->id }}" data-name="{{ $task->name }}">{{ __('index.edit') }}</button>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="delete-btn">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger delete">
                                        {{ __('index.delete') }}
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
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('index.add_task') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <input type="text" name="project_id" class="id-input" value="{{ $project->id }}" style="display: none;">
                            <div class="form-group">
                                <label for="name">{{ __('index.task_name') }}</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('index.task_name_placeholder') }}" required>
                            </div>
                            <button class="btn btn-primary add-btn-submit" type="submit">{{ __('index.add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('index.edit_task') }}</h5>
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
                                <label for="name">{{ __('index.task_name') }}</label>
                                <input type="text" name="name" class="form-control" id="task_name_u" placeholder="{{ __('index.task_name_placeholder') }}" required>
                            </div>
                            <button class="btn btn-primary edit-task-submit-btn" type="submit">{{ __('index.done') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
