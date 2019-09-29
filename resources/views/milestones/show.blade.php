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

                    <a href="{{ route('milestones.edit', [$milestone->project, $milestone]) }}" class="btn btn-primary">Edit Milestone</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
