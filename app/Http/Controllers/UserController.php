<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index(): View
    {
        if (request()->has('archived')) {
            $users = User::onlyTrashed()
                         ->paginate(10);

            return view('users.index')->with(compact('users'));
        }
        $users = User::query()
                     ->paginate(10);

        return view('users.index')->with(compact('users'));
    }


    public function create(): View
    {

        return view('users.create');
    }


    public function store(Request $request)
    {
        User::query()
            ->create($request->except('_token'));
        session()->flash('success', 'User was successfully created.');

        return redirect()->route('settings.users.index');
    }


    public function show(User $user): View
    {
        return view('users.show')->with(compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $user->update($request->except('_token'));
        session()->flash('success', 'User was successfully updated.');

        return redirect()->route('settings.users.index');
    }


    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', 'User was successfully deleted.');

        return redirect()->route('settings.users.index');
    }


    public function restore($user)
    {
        User::query()
            ->withTrashed()
            ->findOrFail($user)
            ->restore();
        session()->flash('success', 'User was successfully restored.');

        return redirect()->route('settings.users.index');
    }
}
