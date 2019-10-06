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
                <h1>Issue Categories</h1>
                <a href="{{ route('categories.new') }}" class="btn btn-primary">New Category</a>
            </div>
            <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <div>
                                <h4 class="m-0">{{ $category->name }}</h4>
                                <p>{{ $category->description }}</p>
                            </div>
                            <a href="{{ route('categories.edit', $category) }}">Edit</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
