<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MilestonesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(int $id)
    {

    }

    public function new(int $id)
    {

    }

    public function create(Request $request, int $id)
    {

    }

    public function edit(int $id, int $milestoneId)
    {

    }

    public function update(Request $request, int $id, int $milestoneId)
    {

    }

    public function show(int $id, int $milestoneId)
    {

    }

    public function destroy(int $id, int $milestoneId)
    {

    }
}
