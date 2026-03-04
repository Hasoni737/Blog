<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    # Store
    public function store(Request $request, $id)
    {
        // Validation
        $request->validate([
            'content' => [
                'required',
                'string',
                'max:1500',
            ],
        ], [
            'content.required' => "You can't leave a comment empty!",
            'content.min' => 'The comment is too short, write something useful.',
        ]);;

        // Store
        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'post_id' => $id
        ]);

        // Redirection
        return back()->withFragment('comments-section');
    }

    # Delete Comment
    public function destroy($id)
    {
        // Delete
        Comment::destroy($id);

        // Redirection
        return back()->withFragment('comments-section');
    }

    # Edit Comment
    public function edit($id) {
        // Redirection
        return back()->withFragment('comments-section')->with('edit', $id);
    }

    # Update Comment
    public function update(Request $request) {
        // Redirection

    }

}
