<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueTypeRequest;
use App\Models\IssueType;

class IssueTypesController extends Controller
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
     * Show the issue type listing
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $types = IssueType::all();

        return view('types.index', ['types' => $types]);
    }

    /**
     * Show the page to create a new issue type
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new()
    {
        return view('types.new');
    }

    /**
     * POST-action that creates a new issue type
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(IssueTypeRequest $request)
    {
        IssueType::create($request->validated());

        return redirect()
                ->route('types.index')
                ->with('status', __('types.messages.create.success'));
    }

    /**
     * Show the page to edit an issue type
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(IssueType $issueType)
    {
        return view('types.edit', ['type' => $issueType]);
    }

    /**
     * PUT-action to update an issue types properties
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IssueTypeRequest $request, IssueType $issueType)
    {
        $issueType->update($request->validated());

        return redirect()
                ->route('types.index')
                ->with('status', __('types.messages.update.success'));
    }

    /**
     * DELETE-action to delete an issue type
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(IssueType $issueType)
    {
        $issueType->delete();

        return redirect()
                ->route('types.index')
                ->with('status', __('types.messages.destroy.success'));
    }
}
