@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Issue Type</div>
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

                    <form method="POST" action="{{ route('types.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="issueTypeName">Name:</label>
                            <input type="text" class="form-control" id="issueTypeName" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="issueTypeDescription">Description:</label>
                            <textarea class="form-control" id="issueTypeDescription" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Type</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
