<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Events\NewComment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function store(Request $request)
    {

        $request->validate(
            [
                'content' => 'required|string|max:1000',
                'post_id' => 'required|exists:posts,id',
            ]
        );



        //get current user with comment and post    this method the best !
        $user = $request->user('sanctum');
        $comment = $user->comments()->create([
            'post_id' => $request->post('post_id'),
            'content' => $request->post('content'),
        ]);
        $post = $comment->post->increment('comments_count');
        // $post->increment('comments_count');
        $comment->save();
        event(new NewComment($comment));

        return response()->json($comment, 201);
    }
}
