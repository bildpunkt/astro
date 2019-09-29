@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Milestone</div>
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

                    <form method="POST" action="{{ route('milestones.update', [$milestone->project, $milestone]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="milestoneName">Name:</label>
                            <input type="text" class="form-control" id="milestoneName" name="name" value="{{ $milestone->name }}"/>
                        </div>
                        <div class="form-group">
                            <label for="milestoneDescription">Description:</label>
                            <textarea class="form-control" id="milestoneDescription" name="description">{{ $milestone->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Milestone</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
