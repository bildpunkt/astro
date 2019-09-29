@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Project</div>
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

                    <form method="POST" action="{{ route('projects.update', $project) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="projectName">Name:</label>
                            <input type="text" class="form-control" id="projectName" name="name" value="{{ $project->name }}"/>
                        </div>
                        <div class="form-group">
                            <label for="projectDescription">Description:</label>
                            <textarea class="form-control" id="projectDescription" name="description">{{ $project->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="projectUrl">Project URL:</label>
                            <input type="url" class="form-control" id="projectUrl" name="url" value="{{ $project->url }}"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Project</button>
                    </form>

                    <form method="POST" action="{{ route('projects.destroy', $project) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
