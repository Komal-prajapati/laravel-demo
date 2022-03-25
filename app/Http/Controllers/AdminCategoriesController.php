<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;

class AdminCategoriesController extends Controller
{
    /**
     * Display all or the filtered/searched categories.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Display the form to add a new category.
     *
     * @return  \Inertia\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store the new category data.
     *
     * @param  \App\Http\Requests\CategoriesRequest  $request
     * @return \Illuminate\Http7JsonResponse
     */
    public function store(CategoriesRequest $request)
    {
        Category::create($request->all());

        session()->flash('successMessage', "Category created successfully");

        return back();
    }

    /**
     * Display the edit category form of the given category id.
     *
     * @param  integer  $id
     * @return void|\Inertia\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (! $category) {
            abort(404);
        }

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the category data of the given category id.
     *
     * @param  integer  $id
     * @param  \App\Http\Requests\CategoriesRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, CategoriesRequest $request)
    {
        $category = Category::find($id);
        if (! $category) {
            session()->flash('customErrorMessage', "Category not found with the given id.");
            return back();
        }

        $category->update($request->all());

        session()->flash('successMessage', "Category updated successfully.");

        return back();
    }

    /**
     * Delete the category data of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (! $category) {
            session()->flash('customErrorMessage', "Category not found with the given id.");
            return back();
        }

        $category->delete();

        session()->flash('successMessage', "Category deleted successfully.");

        return redirect(route('admin.categories'));
    }
}
