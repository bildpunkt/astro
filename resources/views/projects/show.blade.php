@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $project->name }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($project->description)
                        <p>{{ $project->description }}</p>
                    @endif

                    @if($project->url)
                        <p>
                            <a href="{{ $project->url }}">{{ $project->url }}</a>
                        </p>
                    @endif

                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit Project</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
