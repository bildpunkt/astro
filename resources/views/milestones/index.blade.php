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
                <h1>Milestones</h1>
                <a href="{{ route('milestones.new', $project) }}" class="btn btn-primary">New Milestone</a>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($project->milestones as $milestone)
                <li class="list-group-item">
                    <a href="{{ route('milestones.show', [$project, $milestone]) }}">
                        <h2>{{ $milestone->name }}</h2>
                    </a>
                    @if ($milestone->description)
                        <p>{{ $milestone->description }}</p>
                    @endif

                    @include('issues.table', ['issues' => $milestone->issues, 'additionalClasses' => ['table-bordered']])
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
