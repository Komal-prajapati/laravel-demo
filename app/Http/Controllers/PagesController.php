<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactEnquiry;
use App\Models\PackageEnquiry;
use App\Mail\ContactEnquiryReceived;
use App\Models\NewsletterSubscription;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    /**
     * Display the home page of the application.
     *
     * @return \Illuminate\View\View
     */
    public function homePage()
    {
        $packages = \App\Models\Package::latest()->get();

        $testimonials = \App\Models\Testimonial::latest()->get();

        return view('welcome', compact('packages', 'testimonials'));
    }

    /**
     * Display the about page of the application.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the all the packages.
     *
     * @return \Illuminate\View\View
     */
    public function packages()
    {
        $packages = \App\Models\Package::latest()->get();

        return view('packages', compact('packages'));
    }

    /**
     * Display the single package details page of the given package slug.
     *
     * @param  $slug  string
     * @return \Illuminate\View\View
     */
    public function singlePackage($slug)
    {
        $package = \App\Models\Package::where('slug', $slug)->first();
        if (! $package) {
            abort(404);
        }

        return view('single-package-details', compact('package'));
    }

    public function enquireSinglePackage(Request $request)
    {
        $this->validate($request, [
            'message_content' => 'required',
        ]);

        $package = \App\Models\Package::find($request->package_id);
        if (! $package) {
            return back();
        }

        $user = auth()->user();
        \App\Models\PackageEnquiry::create([
            'user_id' => $user->id,
            'user_details' => json_encode($user->toArray()),
            'package_id' => $request->package_id,
            'package_details' => json_encode($package->toArray()),
            'message_content' => $request->message_content,
        ]);

        session()->flash("successMessagePackage", "Package Enquiry sent successfully. We will get back to you shortly.");

        return back();
    }

    /**
     * Display the contact page of the application.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Store the contact enquiry form details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeContact(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|max:255',
            'email' => 'required|email:filter',
            'contact_number' => 'required|numeric|digits:10',
            'message_content' => 'required|max:1000',
        ]);

        $enquiry = ContactEnquiry::create($request->all());

        \Illuminate\Support\Facades\Mail::to(config('mail.admin.address'))
            ->send(new ContactEnquiryReceived($enquiry));

        session()->flash("successMessageContact", "Contact Enquiry sent successfully. We will get back to you shortly.");

        return back();
    }

    /**
     * Store the newsletter subscription email address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeNewsletterSubs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:filter|unique:newsletter_subscriptions,email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'newsletter')->withInput();
        }

        $request['status'] = true;
        NewsletterSubscription::create($request->all());

        session()->flash("successMessage", "Congratulations! You have successfully subscribed to the our newletter.");

        return back();
    }
}
