<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Auth;
use App\Models\ContactEnquiry;
use App\Models\NewsletterSubscription;
   
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('dashboard');
    }

    /**
     * Display all the contact enquiries.
     *
     * @return \Illuminate\View\View
     */
    public function contactEnquires()
    {
        if (Auth::user() && (Auth::user()->is_admin == 1)) {
            $enquiries = ContactEnquiry::all();

            return view('admin.contact-enquries', compact('enquiries'));
        }
    }

    /**
     * Display all the newsletter subscription email addresses.
     *
     * @return \Illuminate\View\View
     */
    public function newsletter()
    {
        $subscriptions = collect();
        if (auth()->user() && auth()->user()->is_admin == 1) {
            $subscriptions = NewsletterSubscription::latest()->get();
        }

        return view('admin.newsletter-subscription', compact('subscriptions'));
    }

    /**
     * Toggle the status of the newsletter email subscription.
     *
     * @param  integer  $subscriptionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleEmailSubsStatus($subscriptionId)
    {
        $subscription = NewsletterSubscription::find($subscriptionId);
        if (! $subscription) {
            session()->flash('notFound', 'Subscribed E-mail id not found');
            return back();
        }

        $subscription->update(['status' => ! $subscription->status]);

        return back();
    }
}
