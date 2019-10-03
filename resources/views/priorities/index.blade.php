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
                <h1>Issue Priorities</h1>
                <a href="{{ route('priorities.new') }}" class="btn btn-primary">New Priority</a>
            </div>
            <ul class="list-group">
                @foreach ($priorities as $priority)
                    <li class="list-group-item">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <p class="m-0">{{ $priority->name }}</p>
                            <a href="{{ route('priorities.edit', $priority) }}">Edit</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
