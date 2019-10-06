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
        @include('issues.table', ['issues' => $project->issues])
    </div>
</div>
@endsection
