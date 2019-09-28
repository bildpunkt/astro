@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('projects.new') }}" class="btn btn-primary">New Project</a>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($projects as $project)
                        <li class="list-group-item">
                            <h5>
                                <a href="{{ route('projects.show', ['id' => $project->id]) }}">
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
    </div>
</div>
@endsection
