<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PackageEnquiry;

class UserPackageEnquiriesController extends Controller
{
    /**
     * Display all package enquiries done by the authenticated user.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $enquiries = PackageEnquiry::where('user_id', auth()->id())->latest()->get()->map(function ($enquiry) {
            $enquiry->package_details = json_decode($enquiry->package_details, true);
            return $enquiry;
        });

        return view('user-package-enquiries', compact('enquiries'));
    }

    /**
     * Display the package enquiry of the given package id.
     *
     * @param  integer  $id
     * @return void|\Inertia\Response
     */
    public function show($id)
    {
        $enquiry = PackageEnquiry::where('user_id', auth()->id())->find($id);
        $packageDetails = json_decode($enquiry->package_details, true);

        return view('user-package-enquiries-show', compact('enquiry', 'packageDetails'));
    }
}
