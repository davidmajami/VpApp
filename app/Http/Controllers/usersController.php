<?php

namespace App\Http\Controllers;

use App\Http\Requests\userStoreRequest;
use App\Http\Requests\userUpdateRequest;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class usersController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::all();

        return view('user.index', [
            'users' => $users,
        ]);
    }

    public function create(Request $request): View
    {
        return view('user.create');
    }

    public function store(userStoreRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        session()->flash('success', 'Korisnik uspešno kreiran!');

        return redirect()->route('users.index');
    }


    public function show(Request $request, User $user): View
    {
        return view('user.show', [
            'user' => $user,
        ]);
    }

    public function edit(Request $request, User $user): View
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(userUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        session()->flash('success', 'Korisnik uspešno izmenjen!');

        return redirect()->route('users.index');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
