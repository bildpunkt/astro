<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssuePriorityRequest;
use App\Models\IssuePriority;

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
        return view('priorities.new');
    }

    /**
     * POST-action that creates a new issue priority
     *
     * @param \App\Http\Requests\IssuePriorityRequest
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(IssuePriorityRequest $request)
    {
        IssuePriority::create($request->validated());

        return redirect()
                ->route('priorities.index')
                ->with('status', __('prorities.messages.create.success'));
    }

    /**
     * Show the page to edit an issue priority
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(IssuePriority $issuePriority)
    {
        return view('priorities.edit', ['priority' => $issuePriority]);
    }

    /**
     * PUT-action to update an issue priorities properties
     *
     * @param \App\Http\Requests\IssuePriorityRequest
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IssuePriorityRequest $request, IssuePriority $issuePriority)
    {
        $issuePriority->update($request->validated());

        return redirect()
                ->route('priorities.index')
                ->with('status', __('prorities.messages.update.success'));
    }

    /**
     * DELETE-action to delete an issue priority
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(IssuePriority $issuePriority)
    {
        $issuePriority->delete();

        return redirect()
                ->route('priorities.index')
                ->with('status', __('prorities.messages.destroy.success'));
    }
}
