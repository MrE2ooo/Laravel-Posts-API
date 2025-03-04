<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum') // Apply to all methods
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // If the user is an admin, return all posts
        if ($request->user()->is_admin) {
            return Post::all();
        }

        // If the user is not an admin, return only their posts
        return $request->user()->posts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'sometimes|exists:users,id', // Allow admins to specify a user_id
        ]);

        // If the user is an admin and a user_id is provided, create the post for that user
        if ($request->user()->is_admin && isset($fields['user_id'])) {
            $user = User::findOrFail($fields['user_id']);
            $post = $user->posts()->create($fields);
        } else {
            // Otherwise, create the post for the authenticated user
            $post = $request->user()->posts()->create($fields);
        }

        // Return the created post
        return response($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Allow admins to bypass the Gate check
        if (!$request->user()->is_admin) {
            Gate::authorize('modify', $post);
        }

        // Validate the request
        $fields = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        $post->update($fields);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {
        // Allow admins to bypass the Gate check
        if (!$request->user()->is_admin) {
            Gate::authorize('modify', $post);
        }

        $post->delete();
        return ['message' => 'the post was deleted'];
    }
}