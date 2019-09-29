<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::all();

        return view('projects.index', ['projects' => $projects]);
    }

    public function new()
    {
        return view('projects.new');
    }

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

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

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

    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'Project successfully removed!');
    }
}
