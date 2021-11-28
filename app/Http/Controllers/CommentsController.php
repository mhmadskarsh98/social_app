<?php

namespace App\Http\Controllers;

use App\Events\NewComment;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //

    public function store(Request $request)
    {


        $request->validate(
            [
                'content' =>'required|string|max:1000',
                'post_id' =>'required|exists:posts,id',
            ]);



        //get current user with comment and post    this method the best !
        $user= $request->user();
        $comment= $user->comments()->create([
            'post_id' => $request->post('post_id'),
            'content' => $request->post('content'),
        ]);
        $post = $comment->post->increment('comments_count');
        // $post->increment('comments_count');
        $comment->save();
        event(new NewComment($comment));



        return redirect()->back()->with('stauts', 'comment added !');




         //get post with comment and user

        //  $post = Post::findOrFail($request->post('post_id'));
        //  $post->comments([
        //     'user_id' => $user->id,
        //     'content' => $request->post('content'),


        //  ]);



        // // without relation
        // $comment = Comment::create([
        //     'post_id' => $request->post('post_id'),
        //     'user_id'=> $user,
        //     'content'=>$request->post('content'),
        // ]);

    }

    public function delete()
    {

     }
}
