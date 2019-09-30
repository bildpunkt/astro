<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
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
     * Show the project listing
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the page to create a new project
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new()
    {
        return view('projects.new');
    }

    /**
     * POST-action that creates a new project
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'url' => 'nullable'
        ]);

        $project = Project::create($validatedData);

        return redirect()->route('projects.show', $project->id)->with('status', 'Project successfully created!');
    }

    /**
     * Show the page to edit a project
     *
     * @param \App\Models\Project
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * PUT-action to update a projects properties
     *
     * @param \Illuminate\Http\Request
     * @param \App\Models\Project
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'url' => 'nullable'
        ]);

        Project::whereId($project->id)->update($validatedData);

        return redirect()->route('projects.show', $project->id)->with('status', 'Project successfully updated!');
    }

    /**
     * Show the detail page of a project
     *
     * @param \App\Models\Project
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }

    /**
     * DELETE-action to delete a project
     *
     * @param \App\Models\Project
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'Project successfully removed!');
    }
}
