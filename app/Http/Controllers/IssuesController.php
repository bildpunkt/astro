<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Issue;
use App\Models\Project;
use App\Models\User;

class IssuesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(int $id)
    {
        $project = Project::findOrFail($id);

        return view('issues.index', ['project' => $project]);
    }

    public function new(int $id)
    {
        $project = Project::findOrFail($id);
        $users = User::all();

        return view('issues.new', ['project' => $project, 'users' => $users]);
    }

    public function create(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'description' => 'nullable',
            'assigned_to_id' => 'nullable'
        ]);

        $validatedData['author_id'] = Auth::user()->id;
        $validatedData['project_id'] = $id;

        $issue = Issue::create($validatedData);

        return redirect()->route('issues.index', $id)->with('status', 'Issue successfully created!');
    }

    public function edit(int $id)
    {

    }

    public function update(Request $request, int $id)
    {

    }

    public function show(int $id, int $issue_id)
    {
        $issue = Issue::where('id', $issue_id)
                        ->where('project_id', $id)
                        ->firstOrFail();

        return view('issues.show', ['issue' => $issue, 'project_id' => $id]);
    }

    public function destroy(int $id)
    {

    }
}
