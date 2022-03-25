<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;

class AdminUsersController extends Controller
{
    /**
     * Display all or the filtered/searched users.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $users = User::where('is_admin', 0)->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the form to add new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store the new user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:filter|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'city' => 'required',
            'pin_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            'contact_number' => 'required|numeric',
        ]);

        $request['settings'] = json_encode([
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'pin_code' => $request->pin_code,
            'state' => $request->state,
            'country' => $request->country,
            'contact_number' => $request->contact_number,
        ]);
        $request['password'] = bcrypt($request->password);
        User::create($request->all());

        session()->flash('successMessage', "User added successfully.");

        return back();
    }

    /**
     * Display the edit user form of the given user id.
     *
     * @param  integer  $id
     * @return void|\Inertia\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (! $user) {
            abort(404);
        }
        $userSetting = json_decode($user->settings, true);

        return view('admin.users.show', compact('user', 'userSetting'));
    }

    /**
     * Display the edit user form of the given user id.
     *
     * @param  integer  $id
     * @return void|\Inertia\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (! $user) {
            abort(404);
        }
        $userSetting = json_decode($user->settings, true);

        return view('admin.users.edit', compact('user', 'userSetting'));
    }

    /**
     * Update the user data of the given user id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:filter|unique:users,email,'.$id,
            'password' => 'nullable',
            'confirm_password' => 'nullable|same:password',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'city' => 'required',
            'pin_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            'contact_number' => 'required|numeric',
        ]);

        $user = User::find($id);
        if (! $user) {
            session()->flash('customErrorMessage', 'User not found with the given id.');
            return back();
        }

        $request['settings'] = json_encode([
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'pin_code' => $request->pin_code,
            'state' => $request->state,
            'country' => $request->country,
            'contact_number' => $request->contact_number,
        ]);
        if ($request->password) {
            $request['password'] = bcrypt($request->password);
        }
        $user->update($request->all());

        session()->flash('successMessage', "User updated successfully.");

        return back();
    }

    /**
     * Delete the user data of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (! $user) {
            session()->flash('customErrorMessage', "User not found with the given id.");
            return back();
        }

        $user->delete();

        session()->flash('successMessage', "User deleted successfully.");

        return redirect(route('admin.users'));
    }
}
