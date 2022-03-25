<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Requests\SettingsRequest;

class AccountSettingsController extends Controller
{
    /**
     * Display the edit form to update the account settings
     * of the authenticated user.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->user();
        if (! $user->settings) {
            $user->update([
                'settings' => json_encode([
                    'address_line_1' => null,
                    'address_line_2' => null,
                    'city' => null,
                    'pin_code' => null,
                    'state' => null,
                    'country' => null,
                    'contact_number' => null,
                ]),
            ]);
        }
        $settings = json_decode($user->fresh()->settings, true) ?? [];

        return view('admin.settings', compact('user', 'settings'));
    }

    /**
     * Update the account settings of the authenticated user.
     *
     * @param  \App\Http\Requests\SettingsRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SettingsRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'settings' => json_encode([
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'city' => $request->city,
                'pin_code' => $request->pin_code,
                'state' => $request->state,
                'country' => $request->country,
                'contact_number' => $request->contact_number,
            ]),
        ]);

        session()->flash('successMessage', "Account settings updated successfully.");

        return back();
    }
}
