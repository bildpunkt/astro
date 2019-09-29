@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $milestone->name }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($milestone->description)
                        <p>{{ $milestone->description }}</p>
                    @endif

                    @if($milestone->issues)
                        <ul class="list-group">
                            @foreach ($milestone->issues as $issue)
                                <li class="list-group-item">
                                    <a href="{{ route('issues.show', [$issue->project, $issue]) }}">
                                        {{ $issue->subject }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ route('milestones.edit', [$milestone->project, $milestone]) }}" class="btn btn-primary">Edit Milestone</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
