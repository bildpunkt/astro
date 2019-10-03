<?php

namespace App\Http\Controllers;

use App\Models\IssuePriority;
use Illuminate\Http\Request;

class IssuePrioritiesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the issue priority listing
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $priorities = IssuePriority::all();

        return view('priorities.index', ['priorities' => $priorities]);
    }

    /**
     * Show the page to create a new issue priority
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new()
    {

    }

    /**
     * POST-action that creates a new issue priority
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {

    }

    /**
     * Show the page to edit an issue priority
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(IssuePriority $issuePriority)
    {

    }

    /**
     * PUT-action to update an issue priorities properties
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, IssuePriority $issuePriority)
    {

    }

    /**
     * DELETE-action to delete an issue priority
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {

    }
}
