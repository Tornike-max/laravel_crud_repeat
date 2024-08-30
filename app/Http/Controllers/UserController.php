<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->orderBy('created_at', 'desc')->paginate();

        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);
        return redirect()->route('sessions.loginform')->with('success', 'User Registered successfylly');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (!isset($user)) {
            return redirect()->route('posts.index');
        }
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|min:2',
            'email' => 'nullable|string',
            'image_url' => 'nullable|image'
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $validatedData['image_url'] = 'images/' . $imageName;

        $updateBool = $user->update($validatedData);
        if ($updateBool === true) {
            return redirect()->route('users.show', $user->id);
        } else {
            return redirect()->route('users.edit', $user->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
