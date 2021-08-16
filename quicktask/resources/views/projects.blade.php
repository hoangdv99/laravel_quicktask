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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProjectModal">{{ __('index.add_project') }}</button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-2">{{ __('index.project_id') }}</th>
                        <th class="col-2">{{ __('index.project_name') }}</th>
                        <th class="col-6">{{ __('index.project_description') }}</th>
                        <th class="col-2">{{ __('index.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->description }}</td>
                            <td style="display: flex;">
                                <button type="button" class="btn btn-warning edit-project-btn" data-toggle="modal" data-target="#editProjectModal" data-id="{{ $project->id }}" data-name="{{ $project->name }}" data-description="{{ $project->description }}" >{{ __('index.edit') }}</button>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="delete-btn">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger delete">
                                        {{ __('index.delete') }}
                                    </button>
                                </form>
                                <a class="btn btn-primary" href="{{ route('projects.show', $project->id) }}">{{ __('index.view') }}</a>
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
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('index.add_project') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('projects.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{ __('index.project_name') }}</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('index.project_name_placeholder') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('index.project_description') }}</label>
                                <textarea name="description" class="form-control" id="description" placeholder="{{ __('index.project_description_placeholder') }}"></textarea>
                            </div>
                            <button class="btn btn-primary add-btn-submit" type="submit">{{ __('index.add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('index.edit_project') }}</h5>
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
                                <label for="name">{{ __('index.project_name') }}</label>
                                <input type="text" name="name" class="form-control" id="name_u" placeholder="{{ __('index.project_name_placeholder') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('index.project_description') }}</label>
                                <textarea name="description" class="form-control" id="description_u" placeholder="{{ __('index.project_description_placeholder') }}"></textarea>
                            </div>
                            <button class="btn btn-primary edit-project-submit-btn" type="submit">{{ __('index.done') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
