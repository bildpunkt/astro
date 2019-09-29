@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Issue</div>
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

                    <form method="POST" action="{{ route('issues.update', [$issue->project, $issue]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="issueSubject">Subject:</label>
                            <input type="text" class="form-control" id="issueSubject" name="subject" value="{{ $issue->subject }}"/>
                        </div>
                        <div class="form-group">
                            <label for="issueDescription">Description:</label>
                            <textarea class="form-control" id="projectDescription" name="description">{{ $issue->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="issueAssignee">Assigned to:</label>
                            <select class="custom-select" name="assigned_to_id">
                                <option value="0">None</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ optional($issue->assignee)->id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="issueMilestone">Milestone:</label>
                            <select class="custom-select" name="milestone_id">
                                <option value="0">None</option>
                                @foreach ($issue->project->milestones as $milestone)
                                    <option value="{{ $milestone->id }}" {{ optional($issue->milestone)->id == $milestone->id ? 'selected' : '' }}>{{ $milestone->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Issue</button>
                    </form>
                    <form method="POST" action="{{ route('issues.destroy', [$issue->project, $issue]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete Issue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
