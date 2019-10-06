<?php

namespace App\Http\Controllers;

use App\Http\Requests\MilestoneRequest;
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
     * @param \App\Http\Requests\MilestoneRequest
     * @param \App\Models\Project
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(MilestoneRequest $request, Project $project)
    {
        $validatedData = $request->validated();

        $validatedData['project_id'] = $project->id;

        $milestone = Milestone::create($validatedData);

        return redirect()
                ->route('milestones.show', [$project->id, $milestone->id])
                ->with('status', __('milestones.messages.create.success'));
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
     * @param \App\Http\Requests\MilestoneRequest
     * @param \App\Models\Project
     * @param \App\Models\Milestone
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MilestoneRequest $request, Project $project, Milestone $milestone)
    {
        $milestone->update($request->validated());

        return redirect()
                ->route('milestones.show', ['project' => $project, 'milestone' => $milestone])
                ->with('status', __('milestones.messages.update.success'));
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

        return redirect()
                ->route('milestones.index', $project)
                ->with('status', __('milestones.messages.destroy.success'));
    }
}
