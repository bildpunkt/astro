@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('projects.navigation')

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('milestones.new', $project) }}" class="btn btn-primary">New Milestone</a>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($project->milestones as $milestone)
                        <li class="list-group-item">
                            <a href="{{ route('milestones.show', [$project, $milestone]) }}">
                                {{ $milestone->name }}
                            </a>
                            @if ($milestone->description)
                                <p>{{ $milestone->description }}</p>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
