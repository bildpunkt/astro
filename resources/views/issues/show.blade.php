@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $issue->subject }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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

                    <a href="{{ route('issues.edit', [$issue->project, $issue]) }}" class="btn btn-primary">Edit Issue</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
