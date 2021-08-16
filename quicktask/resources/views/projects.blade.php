@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center add-btn">
        <div class="col-md-10">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProjectModal">Add new project</button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-2">Project ID</th>
                        <th class="col-2">Name</th>
                        <th class="col-6">Description</th>
                        <th class="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->description }}</td>
                            <td style="display: flex;">
                                <button type="button" class="btn btn-warning edit-project-btn" data-toggle="modal" data-target="#editProjectModal" data-id="{{ $project->id }}" data-name="{{ $project->name }}" data-description="{{ $project->description }}" >Edit</button>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="delete-btn">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger delete">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                                <a class="btn btn-primary" href="{{ route('projects.show', $project->id) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('projects.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter project name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" placeholder="Enter project description"></textarea>
                            </div>
                            <button class="btn btn-primary add-btn-submit" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('projects.update', 'edit') }}">
                            @csrf
                            @method("PUT")
                            <input type="text" name="id" class="id-input" id="id_u" style="display: none;">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name_u" placeholder="Enter project name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description_u" placeholder="Enter project description"></textarea>
                            </div>
                            <button class="btn btn-primary edit-project-submit-btn" type="submit">Done</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
