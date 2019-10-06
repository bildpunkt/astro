@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        @include('projects.navigation', ['project' => $milestone->project])
        <div class="card-body">
            <div class="d-flex w-100 align-items-center justify-content-between">
                <h1>{{ $milestone->name }}</h1>
                <a href="{{ route('milestones.edit', [$milestone->project, $milestone]) }}" class="btn btn-outline-secondary">Edit Milestone</a>
            </div>

            @if($milestone->description)
                <p>{{ $milestone->description }}</p>
            @endif

            @if($milestone->issues)
                @include('issues.table', ['issues' => $milestone->issues, 'additionalClasses' => ['table-bordered']])
            @endif
        </div>
    </div>
</div>
@endsection
