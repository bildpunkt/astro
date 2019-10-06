<table class="table table-responsive-sm mb-0 @foreach(($additionalClasses ?? []) as $class){{ $class }} @endforeach">
    <thead>
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>Priority</th>
            <th>Subject</th>
            <th>Assigned to</th>
            <th>Milestone</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($issues as $issue)
            <tr>
                <td>{{ $issue->id }}</td>
                <td>{{ $issue->type->name }}</td>
                <td>{{ $issue->priority->name }}</td>
                <td>
                    <a href="{{ route('issues.show', [$issue->project, $issue]) }}">
                        {{ $issue->subject }}
                    </a>
                </td>
                <td>{{ optional($issue->assignee)->name }}</td>
                <td>{{ optional($issue->milestone)->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
