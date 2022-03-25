<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PackageEnquiry;

class AdminPackageEnquiriesController extends Controller
{
    /**
     * Display all package enquiries done.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $userId = request('user') ?? null;

        $enquiries = PackageEnquiry::query();
        if ($userId) {
            $enquiries = $enquiries->where('user_id', $userId);
        }

        $enquiries = $enquiries->latest()->get()->map(function ($enquiry) {
            $enquiry->user_details = json_decode($enquiry->user_details, true);
            $enquiry->user_contact_number = json_decode($enquiry->user_details['settings'], true)['contact_number'];
            $enquiry->package_details = json_decode($enquiry->package_details, true);
            return $enquiry;
        });

        return view('admin.package-enquiries.index', compact('enquiries'));
    }

    /**
     * Display the package enquiry of the given package id.
     *
     * @param  integer  $id
     * @return void|\Inertia\Response
     */
    public function show($id)
    {
        $enquiry = PackageEnquiry::find($id);
        $packageDetails = json_decode($enquiry->package_details, true);
        $userDetails = json_decode($enquiry->user_details, true);
        $userDetails['contact_number'] = json_decode($userDetails['settings'], true)['contact_number'];

        return view('admin.package-enquiries.show', compact('enquiry', 'packageDetails', 'userDetails'));
    }
}
