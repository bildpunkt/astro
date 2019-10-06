<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueRequest;
use App\Models\Issue;
use App\Models\IssuePriority;
use App\Models\IssueType;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IssuesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show a projects issue listing
     *
     * @param \App\Models\Project
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Project $project)
    {
        return view('issues.index', ['project' => $project]);
    }

    /**
     * Show the page to create a new issue
     *
     * @param \App\Models\Project
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new(Project $project)
    {
        $users = User::all();
        $priorities = IssuePriority::all();
        $types = IssueType::all();

        return view(
                'issues.new',
                [
                    'project' => $project,
                    'users' => $users,
                    'priorities' => $priorities,
                    'types' => $types
                ]);
    }

    /**
     * POST-action that creates a new issue
     *
     * @param \App\Http\Requests\IssueRequest
     * @param \App\Models\Project
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(IssueRequest $request, Project $project)
    {
        $validatedData = $request->validated();

        $validatedData['author_id'] = Auth::user()->id;
        $validatedData['project_id'] = $project->id;

        $issue = Issue::create($validatedData);

        return redirect()
                ->route('issues.show', [$project->id, $issue->id])
                ->with('status', __('issues.messages.create.success'));
    }

    /**
     * Show the page to edit an issue
     *
     * @param \App\Models\Project
     * @param \App\Models\Issue
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Project $project, Issue $issue)
    {
        $users = User::all();
        $priorities = IssuePriority::all();
        $types = IssueType::all();

        return view(
                'issues.edit',
                [
                    'issue' => $issue,
                    'users' => $users,
                    'priorities' => $priorities,
                    'types' => $types
                ]);
    }

    /**
     * PUT-action to update an issues properties
     *
     * @param \App\Http\Requests\IssueRequest
     * @param \App\Models\Project
     * @param \App\Models\Issue
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IssueRequest $request, Project $project, Issue $issue)
    {
        $issue->update($request->validated());

        return redirect()
                ->route('issues.show', [$project->id, $issue->id])
                ->with('status', __('issues.messages.update.success'));
    }

    /**
     * Show the detail page of an issue
     *
     * @param \App\Models\Project
     * @param \App\Models\Issue
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Project $project, Issue $issue)
    {
        return view('issues.show', ['issue' => $issue]);
    }

    /**
     * DELETE-action to delete an issue
     *
     * @param \App\Models\Project
     * @param \App\Models\Issue
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project, Issue $issue)
    {
        $issue->delete();

        return redirect()
                ->route('issues.index', $project->id)
                ->with('status', __('issues.messages.destroy.success'));
    }
}
