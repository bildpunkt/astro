<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Milestone;

class MilestonesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Project $project)
    {
        return view('milestones.index', ['project' => $project]);
    }

    public function new(Project $project)
    {
        return view('milestones.new', ['project' => $project]);
    }

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

    public function edit(Project $project, Milestone $milestone)
    {
        return view('milestones.edit', ['milestone' => $milestone]);
    }

    public function update(Request $request, Project $project, Milestone $milestone)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $milestone->update($validatedData);

        return redirect()->route('milestones.show', ['project' => $project, 'milestone' => $milestone])->with('status', 'Milestone successfully updated!');
    }

    public function show(Project $project, Milestone $milestone)
    {
        return view('milestones.show', ['milestone' => $milestone]);
    }

    public function destroy(Project $project, Milestone $milestone)
    {
        $milestone->delete();

        return redirect()->route('milestones.index', $project)->with('status', 'Milestone successfully removed!');
    }
}
