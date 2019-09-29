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

    }

    public function new(Project $project)
    {

    }

    public function create(Request $request, Project $project)
    {

    }

    public function edit(Project $project, Milestone $milestone)
    {

    }

    public function update(Request $request, Project $project, Milestone $milestone)
    {

    }

    public function show(Project $project, Milestone $milestone)
    {

    }

    public function destroy(Project $project, Milestone $milestone)
    {

    }
}
