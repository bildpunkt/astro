<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function new()
    {

    }

    public function create(Request $request)
    {

    }

    public function edit(int $id)
    {

    }

    public function update(Request $request, int $id)
    {

    }

    public function show(int $id)
    {

    }

    public function destroy(int $id)
    {

    }
}
