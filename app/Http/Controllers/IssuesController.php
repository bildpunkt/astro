<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Issue;
use App\Models\Project;
use App\Models\User;

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

        return view('issues.new', ['project' => $project, 'users' => $users]);
    }

    /**
     * POST-action that creates a new issue
     *
     * @param \Illuminate\Http\Request
     * @param \App\Models\Project
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'description' => 'nullable',
            'assigned_to_id' => 'nullable',
            'milestone_id' => 'nullable'
        ]);

        $validatedData['author_id'] = Auth::user()->id;
        $validatedData['project_id'] = $project->id;

        $issue = Issue::create($validatedData);

        return redirect()->route('issues.show', [$project->id, $issue->id])->with('status', 'Issue successfully created!');
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

        return view('issues.edit', ['issue' => $issue, 'users' => $users]);
    }

    /**
     * PUT-action to update an issues properties
     *
     * @param \Illuminate\Http\Request
     * @param \App\Models\Project
     * @param \App\Models\Issue
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project, Issue $issue)
    {
        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'description' => 'nullable',
            'assigned_to_id' => 'nullable',
            'milestone_id' => 'nullable'
        ]);

        $issue->update($validatedData);

        return redirect()->route('issues.show', [$project->id, $issue->id])->with('status', 'Issue successfully updated!');
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

        return redirect()->route('issues.index', $project->id)->with('status', 'Issue successfully removed!');
    }
}
