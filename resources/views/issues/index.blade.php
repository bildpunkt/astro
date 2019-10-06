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
                <h1>Issues</h1>
                <a href="{{ route('issues.new', $project) }}" class="btn btn-primary">New Issue</a>
            </div>
        </div>
        <table class="table table-responsive-sm mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Priority</th>
                    <th>Subject</th>
                    <th>Assigned to</th>
                    <th>Milestone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project->issues as $issue)
                    <tr>
                        <td>{{ $issue->id }}</td>
                        <td>{{ $issue->type->name }}</td>
                        <td>{{ $issue->priority->name }}</td>
                        <td>
                            <a href="{{ route('issues.show', [$project, $issue]) }}">
                                {{ $issue->subject }}
                            </a>
                        </td>
                        <td>{{ optional($issue->assignee)->name }}</td>
                        <td>{{ optional($issue->milestone)->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
