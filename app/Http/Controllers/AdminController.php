<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Get all users (admin only).
     */
    public function getAllUsers()
    {
        // Fetch all users
        $users = User::all();

        // Return the users
        return response($users, 200);
    }

    /**
     * Get a single user by ID (admin only).
     */
    public function getUser(User $user)
    {
        // Return the user
        return response($user, 200);
    }

    /**
     * Delete a user (admin only).
     */
    public function deleteUser(User $user)
    {
        // Delete the user
        $user->delete();

        // Return a success message
        return response(['message' => 'User deleted successfully'], 200);
    }

    /**
     * Get all posts for a specific user (admin only).
     */
    public function getUserPosts(User $user)
    {
        // Fetch all posts for the specified user
        $posts = $user->posts;

        // Return the posts
        return response($posts, 200);
    }

    /**
     * Create a post for a specific user (admin only).
     */
    public function createUserPost(Request $request, User $user)
    {
        // Validate the request
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Create the post for the specified user
        $post = $user->posts()->create($fields);

        // Return the created post
        return response($post, 201);
    }
}