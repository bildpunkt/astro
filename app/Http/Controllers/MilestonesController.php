<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Milestone;

class MilestonesController extends Controller
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
     * Show a projects milestone listing
     *
     * @param \App\Models\Project
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Project $project)
    {
        return view('milestones.index', ['project' => $project]);
    }

    /**
     * Show the page to create a new milestone
     *
     * @param \App\Models\Project
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new(Project $project)
    {
        return view('milestones.new', ['project' => $project]);
    }

    /**
     * POST-action that creates a new milestone
     *
     * @param \Illuminate\Http\Request
     * @param \App\Models\Project
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $validatedData['project_id'] = $project->id;

        $milestone = Milestone::create($validatedData);

        return redirect()->route('milestones.show', [$project->id, $milestone->id])->with('status', 'Milestone successfully created!');
    }

    /**
     * Show the page to edit a milestone
     *
     * @param \App\Models\Project
     * @param \App\Models\Milestone
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Project $project, Milestone $milestone)
    {
        return view('milestones.edit', ['milestone' => $milestone]);
    }

    /**
     * PUT-action to update a milestones properties
     *
     * @param \Illuminate\Http\Request
     * @param \App\Models\Project
     * @param \App\Models\Milestone
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project, Milestone $milestone)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $milestone->update($validatedData);

        return redirect()->route('milestones.show', ['project' => $project, 'milestone' => $milestone])->with('status', 'Milestone successfully updated!');
    }

    /**
     * Show the detail page of a milestone
     *
     * @param \App\Models\Project
     * @param \App\Models\Milestone
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Project $project, Milestone $milestone)
    {
        return view('milestones.show', ['milestone' => $milestone]);
    }

    /**
     * DELETE-action to delete a milestone
     *
     * @param \App\Models\Project
     * @param \App\Models\Milestone
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project, Milestone $milestone)
    {
        $milestone->delete();

        return redirect()->route('milestones.index', $project)->with('status', 'Milestone successfully removed!');
    }
}
