<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::guard('sanctum')->user();
        if ($user->tokenCan('posts')) {
            $posts = Post::with('user.profile')->paginate(1);

            return $posts;
        }

        return response()->json(['message' => ' unauthorized'], 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'content' => ['required', 'max:255'],
            'media' => ['nullable'],
        ]);

        $request->merge([
            'user_id' => 1,
        ]);

        $posts = Post::create($request->all());

        return response()->json($posts, 201);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);

        return $post->load('user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validatedData = $request->validate([
            'content' => ['sometimes', 'required', 'max:255'],
            'media' => ['nullable'],
        ]);

        $request->merge([
            'user_id' => 1,
        ]);

        $posts =  Post::findOrFail($id);
        $posts->update($request->all());
        return new JsonResponse([
            'message' => 'post updated',
            'posts' => $posts,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //
        $posts =  Post::findOrFail($id);
        $posts->delete();
        return [
            'message' => 'post deleted'
        ];
    }
}
