@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Project</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('projects.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="projectName">Name:</label>
                            <input type="text" class="form-control" id="projectName" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="projectDescription">Description:</label>
                            <textarea class="form-control" id="projectDescription" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="projectUrl">Project URL:</label>
                            <input type="url" class="form-control" id="projectUrl" name="url"/>
                        </div>
                        <div class="form-group">
                            <label for="projectParent">Parent Project:</label>
                            <select class="custom-select" name="parent_id">
                                <option value="0" selected>None</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
