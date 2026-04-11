<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Store a new comment (always pending approval)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'comment' => 'required|string|max:2000',
        ]);

        $comment = Comment::create([
            'blog_id' => $validated['blog_id'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'comment' => $validated['comment'],
            'is_approved' => false, // critical for moderation flow
        ]);

        return response()->json([
            'message' => 'Comment submitted successfully and is pending approval.',
            'data' => $comment
        ], 201);
    }
}
