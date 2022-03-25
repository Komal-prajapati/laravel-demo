<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialsRequest;

class AdminTestimonialsController extends Controller
{
    /**
     * Display all or the filtered/searched testimonials.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Display the form to add a new testimonial.
     *
     * @return  \Inertia\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store the new testimonial data.
     *
     * @param  \App\Http\Requests\TestimonialsRequest  $request
     * @return \Illuminate\Http7JsonResponse
     */
    public function store(TestimonialsRequest $request)
    {
        $path = null;
        if ($request->file('image_file')) {
            $file = $request->file('image_file');
            $fileName = $file->hashName();
            $path = $file->storeAs(
                'testimonials', $fileName, 'public'
            );
            $path = '/'.$path;
        }
        $request['person_avatar'] = $path;
        Testimonial::create($request->all());

        session()->flash('successMessage', "Testimonial created successfully");

        return back();
    }

    /**
     * Display the edit testimonial form of the given testimonial id.
     *
     * @param  integer  $id
     * @return void|\Inertia\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        if (! $testimonial) {
            abort(404);
        }

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the testimonial data of the given testimonial id.
     *
     * @param  integer  $id
     * @param  \App\Http\Requests\TestimonialsRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, TestimonialsRequest $request)
    {
        $testimonial = Testimonial::find($id);
        if (! $testimonial) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Testimonial not found with the given id.',
            ]);
        }

        $path = $testimonial->person_avatar;
        if ($request->file('image_file')) {
            if ($path != null) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($path);
            }

            $file = $request->file('image_file');
            $fileName = $file->hashName();
            $path = $file->storeAs(
                'testimonials', $fileName, 'public'
            );
            $path = '/'.$path;
        }
        $request['person_avatar'] = $path;
        $testimonial->update($request->all());

        session()->flash('successMessage', "Testimonial updated successfully.");

        return back();
    }

    /**
     * Delete the testimonial data of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        if (! $testimonial) {
            session()->flash('customErrorMessage', "Testimonial not found with the given id.");
            return back();
        }

        if ($testimonial->person_avatar != null) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($testimonial->person_avatar);
        }
        $testimonial->delete();

        session()->flash('successMessage', "Testimonial deleted successfully.");

        return redirect(route('admin.testimonials'));
    }
}
