<?php

namespace App\Http\Controllers;

use App\Http\Request\IssueCategoryRequest;
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
    }

    /**
     * POST-action that creates a new issue category
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(IssueCategoryRequest $request)
    {
    }

    /**
     * Show the page to edit an issue category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(IssueCategory $issueCategory)
    {
    }

    /**
     * PUT-action to update an issue categories properties
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IssueCategoryRequest $request, IssueCategory $issueCategory)
    {
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
