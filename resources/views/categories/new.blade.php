@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Issue Category</div>
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

                    <form method="POST" action="{{ route('categories.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="issueCategoryName">Name:</label>
                            <input type="text" class="form-control" id="issueCategoryName" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="issueCategoryDescription">Description:</label>
                            <textarea class="form-control" id="issueCategoryDescription" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
