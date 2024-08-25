<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->with('user')->orderBy('id', 'desc')->paginate(4);

        return view('posts/index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();

        return view('posts.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|min:2',
            'body' => 'required|string|min:5',
            'user_id' => 'required'
        ]);

        Post::create($validatedData);
        return redirect()->route('posts.index')->with('success', 'Post created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (isset($post)) {
            return view('posts.show', [
                'post' => $post
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (!isset($post)) {
            abort(404);
        }

        $users = User::select('id', 'name')->get();
        return view('posts.edit', [
            'post' => $post,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'body' => 'nullable|string|min:5',
            'user_id' => 'nullable'
        ]);

        if (!empty($validatedData)) {
            $updateVal = $post->update($validatedData);
            if ($updateVal === true) {
                return redirect()->route('posts.index')->with('success', 'Post updated successfully');
            } else {
                return redirect()->route('posts.edit', $post->id)->with('error', 'Error while updating');
            }
        } else {
            return redirect()->route('posts.edit', $post->id)->with('error', 'Error while updating');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (!isset($post)) {
            abort(404);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
        dd($post);
    }
}
