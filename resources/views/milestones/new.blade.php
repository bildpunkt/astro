@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Milestone</div>
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

                    <form method="POST" action="{{ route('milestones.create', $project) }}">
                        @csrf
                        <div class="form-group">
                            <label for="milestoneName">Name:</label>
                            <input type="text" class="form-control" id="milestoneName" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="milestoneDescription">Description:</label>
                            <textarea class="form-control" id="milestoneDescription" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Milestone</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
