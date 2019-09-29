<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
            <a class="nav-link @if(Route::is('projects.show')) active @endif" href="{{ route('projects.show', $project) }}">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Route::is('milestones.index')) active @endif" href="{{ route('milestones.index', $project) }}">Milestones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Route::is('issues.index')) active @endif" href="{{ route('issues.index', $project) }}">Issues</a>
        </li>
    </ul>
</div>
