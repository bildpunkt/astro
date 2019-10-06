<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueCategoryRequest;
use App\Models\IssueCategory;

class IssueCategoriesController extends Controller
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
        $categories = IssueCategory::all();

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the page to create a new issue category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new()
    {
        return view('categories.new');
    }

    /**
     * POST-action that creates a new issue category
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(IssueCategoryRequest $request)
    {
        IssueCategory::create($request->validated());

        return redirect()
                ->route('categories.index')
                ->with('status', __('categories.messages.create.success'));
    }

    /**
     * Show the page to edit an issue category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(IssueCategory $issueCategory)
    {
        return view('categories.edit', ['category' => $issueCategory]);
    }

    /**
     * PUT-action to update an issue categories properties
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IssueCategoryRequest $request, IssueCategory $issueCategory)
    {
        $issueCategory->update($request->validated());

        return redirect()
                ->route('categories.index')
                ->with('status', __('categories.messages.update.success'));
    }

    /**
     * DELETE-action to delete an issue category
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(IssueCategory $issueCategory)
    {
    }
}
