@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Issue</div>
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

                    <form method="POST" action="{{ route('issues.create', $project) }}">
                        @csrf
                        <div class="form-group">
                            <label for="issueSubject">Subject:</label>
                            <input type="text" class="form-control" id="issueSubject" name="subject"/>
                        </div>
                        <div class="form-group">
                            <label for="issueDescription">Description:</label>
                            <textarea class="form-control" id="projectDescription" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="issueAssignee">Assigned to:</label>
                            <select class="custom-select" name="assigned_to_id">
                                <option value="0" selected>None</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="issueMilestone">Assigned to:</label>
                            <select class="custom-select" name="milestone_id">
                                <option value="0" selected>None</option>
                                @foreach ($project->milestones as $milestone)
                                    <option value="{{ $milestone->id }}">{{ $milestone->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Issue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
