@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Issues</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('issues.new', $project->id) }}" class="btn btn-primary">New Issue</a>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($project->issues as $issue)
                        <li class="list-group-item">
                            <a href="{{ route('issues.show', ['id' => $project->id, 'issue_id' => $issue->id]) }}">
                                {{ $issue->subject }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
