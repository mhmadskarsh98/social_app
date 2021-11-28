<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Service\OpenWeatherMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{


    // if want create middleware u must create constrctor

    public function __construct()
    {

        $this->middleware('password.confirm')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    //if u want
    public function index()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', '=', $user->id)
            ->orWhere(function ($q) use ($user) {
                $q->where('visibilaty', '<>', 'me')
                    ->whereRaw('user_id IN( SELECT follower_id FROM followers WHERE following_id = ?)', [$user->id]);
            })
            ->with('user.profile', 'comments', 'tags',)
            ->withCount(['tags'])->latest()->get();





        return view('posts.index',compact('posts'));


        // 'posts' => Post::with('user.profile','comments','tags',)
        // ->withCount(['tags as tags_number'])->latest()->get(), // user and comments  relation in model



        // 'posts' => Post::get(), // use @ in view
        //
        // 'posts' => Post::withoutGlobalScope('published')->get(),


        // 'posts' => Post::public()->get(),  local scope public
        // 'posts' => Post::visibilaty('follwers')->get(),  dynmic scope


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('posts.create', [
            'posts' => new Post(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        // dd($request->query('content'));


        //validation
        // $request->validate([
        //     'content' => 'required | min:5 | max:244 | string',
        //     'image'=>'required | image | dimensions:max_hight=500,max_width=800',

        // ]);
        //file all of file , mimes:pdf,docx,



        $validtor =  $this->validtor($request);
        $validtor->validate();

        //check file (save image)
        $data = $request->except('media');
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            if ($file->isValid()) {

                $data['media'] = $file->store('media', 'public'); // save media in storage/app/public
            }
        }

        $img = Image::make(storage_path('/app/public/' . $data['media']));
        $img->text('Insta_laravel', 20, $img->height() - 50, function ($font) {
            $font->size(50);
            $font->color('#ffffff');
            $font->angle(45);
        })->save();

        // $data['user_id'] = Auth::id();

        // Auth::check() بتعمل فحص ازا عامل تسجيل دخول ولا لا
        $user = Auth::user();
        $data['user_id'] = $user->id;


        // create post
        $posts = Post::create($data);


        $this->saveTags($posts);


        // $tag = strpos($request->post('content'),'#'); // strop => postion string  ,,
        $posts->save();
        return redirect()->route('posts.index')->with('stauts', 'Post created !');

        // $posts = new Post();
        // $posts->content = $request->post('content'); // the best practies when use post if want read query use query
        // $posts->user_id = null;


        //قرأت الريكوست
        // $request->content // with all
        //$request->post('content) valid only with post put request
        // $request->get('content)
        // $request->input('content') //with all
        //$request->query('content') valid with only get method
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
            return view('posts.show')->with('post',$post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
        $posts = Post::findOrFail($id);
        // if($posts == null){
        //     abort(404);
        // }

        return view('posts.edit')->with('posts', $posts);
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
        //     $data = $request->except('media');
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            if ($file->isValid()) {
                $data['media'] = $file->store('media', 'public'); // save media in storage/app/public
            }
        }

        //validation
        // $request->validate([
        //     'content' => 'required | min:5 | max:244 | string',
        //     'image'=>'required | image | dimensions:max_hight=500,max_width=800',

        // ]);

        $validtor =  $this->validtor($request);
        $validtor->validate();

        //    **********************************************************************


        $data = $request->except('media');
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            if ($file->isValid()) {
                $data['media'] = $file->store('media', 'public'); // save media in storage/app/public
            }
        }


        $posts = Post::findOrFail($id);
        $posts->update($data); //Mass Assignment تسمى هذه طريقة بعت الداتا عن طريق

        $this->saveTags($posts);




        // dd($posts);
        return redirect()->route('posts.index')->with('stauts', 'Post updated !');
        // $posts->content = $request->input('content');
        // $posts->user_id = null;


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
        Post::where('id', '=', $id)->delete();
        return redirect()->route('posts.index')->with('stauts', 'Post deleted !');
        // $posts = Post::find($id);
        // $posts->delete();

    }

    public function trash()
    {

        return view('posts.index', [
            'posts' => Post::onlyTrashed()->get(),
        ]);
    }

    public function restore($id, Request $request)
    {

        $posts = Post::onlyTrashed()->findOrFail($id);
        $posts->restore();

        return redirect()->route('posts.index')->with('stauts', ' post restore');
    }




    public function forceDelete($id)
    {

        $posts = Post::onlyTrashed()->findOrFail($id);
        $posts->forceDelete();

        return redirect()->route('posts.index')->with('stauts', 'ForceDelete');
    }




    protected function validtor(Request $request)
    {
        return  Validator::make(
            $request->all(),
            [
                'content' => ['required ', 'min:5', 'max:244', 'string'],
                'media' => ['nullable', 'image', 'dimensions:max_hight=2048,max_width=2048', 'max:2048'],
            ],
            [
                'required' => 'هذا الحقل مطلوب  ',
                'min' => 'القيمة أقل من الحد الادنى'
            ]
        );
    }

    protected function saveTags($posts)
    {

        // regular expression    //   ^\s mean not space
        preg_match_all('/\#([^\s]+)/', $posts->content, $matches);
        $tag_ids = [];
        if ($matches) {
            $tags = $matches[1];
            foreach ($tags as $tag_name) {

                $tag = Tag::where('name', $tag_name)->first();
                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $tag_name,
                    ]);
                }
                $tag_ids[] = $tag->id;
            }
            $posts->tags()->sync($tag_ids); //sync فحص   // sync used many to many relation

            // $posts->tags()->attach($tag_ids); //add alaways  // attach used many to many relation
            // $posts->tags()->dattach($tag_ids); //delete alaways  // dattach used many to many relation



        }
    }
}


//
// validtor take 3 parameter 1- request 2- validation 3- message
