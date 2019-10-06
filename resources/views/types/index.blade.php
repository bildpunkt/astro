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
                <h1>Issue Types</h1>
                <a href="{{ route('types.new') }}" class="btn btn-primary">New Type</a>
            </div>
            <ul class="list-group">
                @foreach ($types as $type)
                    <li class="list-group-item">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <div>
                                <h4 class="m-0">{{ $type->name }}</h4>
                                <p>{{ $type->description }}</p>
                            </div>
                            <a href="{{ route('types.edit', $type) }}">Edit</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
