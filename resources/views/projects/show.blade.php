@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        @include('projects.navigation')

        <div class="card-body">
            <div class="d-flex w-100 align-items-center justify-content-between">
                <h1>{{ $project->name }}</h1>
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-outline-secondary">Edit Project</a>
            </div>

            @if($project->description)
                <p>{{ $project->description }}</p>
            @endif

            @if($project->url)
                <p>
                    <a href="{{ $project->url }}">{{ $project->url }}</a>
                </p>
            @endif
        </div>
    </div>
</div>
@endsection
