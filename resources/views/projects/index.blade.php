@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="d-flex w-100 align-items-center justify-content-between">
                <h1>Projects</h1>
                <a href="{{ route('projects.new') }}" class="btn btn-primary">New Project</a>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($projects as $project)
                <li class="list-group-item">
                    <h5>
                        <a href="{{ route('projects.show', $project) }}">
                            {{ $project->name }}
                        </a>
                    </h5>
                    @if ($project->description)
                        <p>{{ $project->description }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
