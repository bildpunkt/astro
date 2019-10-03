@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        @include('projects.navigation', ['project' => $issue->project])
        <div class="card-body">
            <div class="d-flex w-100 align-items-center justify-content-between">
                <h1>{{ $issue->subject }}</h1>
                <a href="{{ route('issues.edit', [$issue->project, $issue]) }}" class="btn btn-outline-secondary">Edit Issue</a>
            </div>

            <p>Opened by {{ $issue->author->name }}</p>

            @if($issue->assignee)
                <p>
                    Assigned to {{ $issue->assignee->name }}
                </p>
            @endif

            @if($issue->milestone)
                <p>
                    Milestone:
                    <a href="{{ route('milestones.show', [$issue->milestone->project, $issue->milestone]) }}">
                        {{ $issue->milestone->name }}
                    </a>
                </p>
            @endif

            @if($issue->description)
                <p>{{ $issue->description }}</p>
            @endif

            @foreach ($issue->revisions as $revision)
                {{ $revision->user->name }} updated on {{ $revision->created_at }}

                <ul>
                    @foreach ($revision->attributes as $attribute => $values)
                        <li>
                            {!! $revision->change($attribute, $values) !!}
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
