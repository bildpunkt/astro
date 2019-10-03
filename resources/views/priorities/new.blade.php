@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Issue Priority</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('priorities.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="issuePriorityName">Name:</label>
                            <input type="text" class="form-control" id="issuePriorityName" name="name"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Priority</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
