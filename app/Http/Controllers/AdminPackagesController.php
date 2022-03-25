<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PackagesRequest;

class AdminPackagesController extends Controller
{
    /**
     * Display all or the filtered/searched packages.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $packages = Package::latest()->paginate(10);

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Display the form to add a new package.
     *
     * @return  \Inertia\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.packages.create', compact('categories'));
    }

    /**
     * Store the new package data.
     *
     * @param  \App\Http\Requests\PackagesRequest  $request
     * @return \Illuminate\Http7JsonResponse
     */
    public function store(PackagesRequest $request)
    {
        $imagePath = null;
        if ($request->file('image_file')) {
            $file = $request->file('image_file');
            $fileName = $file->hashName();
            $imagePath = $file->storeAs(
                'packages', $fileName, 'public'
            );
            $imagePath = '/'.$imagePath;
        }
        $pdfPath = null;
        if ($request->file('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = $file->hashName();
            $pdfPath = $file->storeAs(
                'packages', $fileName, 'public'
            );
            $pdfPath = '/'.$pdfPath;
        }
        $request['image'] = $imagePath;
        $request['pdf'] = $pdfPath;
        $request['slug'] = \Illuminate\Support\Str::slug($request->city . '-' . $request->country);
        $categoryIds = $request->category_id;
        $package = Package::create($request->all());
        $package->categories()->attach($categoryIds);

        session()->flash('successMessage', "Package created successfully");

        return back();
    }

    /**
     * Display the edit package form of the given package id.
     *
     * @param  integer  $id
     * @return void|\Inertia\Response
     */
    public function edit($id)
    {
        $package = Package::with('categories')->find($id);
        if (! $package) {
            abort(404);
        }

        $selectedCategories = $package->categories->pluck('id');
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.packages.edit', compact('package', 'categories', 'selectedCategories'));
    }

    /**
     * Update the package data of the given package id.
     *
     * @param  integer  $id
     * @param  \App\Http\Requests\PackagesRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, PackagesRequest $request)
    {
        $package = Package::find($id);
        if (! $package) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Package not found with the given id.',
            ]);
        }

        $path = $package->image;
        if ($request->file('image_file')) {
            if ($path != null) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($path);
            }

            $file = $request->file('image_file');
            $fileName = $file->hashName();
            $path = $file->storeAs(
                'packages', $fileName, 'public'
            );
            $path = '/'.$path;
        }
        $request['image'] = $path;

        $pdfPath = $package->pdf;
        if ($request->file('pdf_file')) {
            if ($pdfPath != null) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($pdfPath);
            }

            $file = $request->file('pdf_file');
            $fileName = $file->hashName();
            $pdfPath = $file->storeAs(
                'packages', $fileName, 'public'
            );
            $pdfPath = '/'.$pdfPath;
        }
        $request['pdf'] = $pdfPath;
        $request['slug'] = \Illuminate\Support\Str::slug($request->city . '-' . $request->country);
        $categoryIds = $request->category_id;
        $package->update($request->all());

        $package->fresh()->categories()->sync($categoryIds);

        session()->flash('successMessage', "Package updated successfully.");

        return back();
    }

    /**
     * Delete the package data of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        if (! $package) {
            session()->flash('customErrorMessage', "Package not found with the given id.");
            return back();
        }

        if ($package->image != null) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($package->image);
        }
        $package->delete();

        session()->flash('successMessage', "Package deleted successfully.");

        return redirect(route('admin.packages'));
    }
}
