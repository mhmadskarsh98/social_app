<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Notifications\NewFollowerNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class ProfileController extends Controller
{
    //
    public function index($username = null)
    {
        if ($username == null) {
            return Auth::user('sanctum');
        } else {
            $user = User::where('username', $username)->first();
            if (!$user) {
                abort('404', 'username not found');
            }
        }
        return response()->json($user, 200);
    }

    public function store(Request $request)
    {
        $user = Auth::guard('sanctum')->id();

        $data = $request->all();

        $data['user_id'] = $user;

        $profile = Profile::create($data);

        return new JsonResponse(['message' => 'profile created', 'profile' => $profile]);
    }



    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user()->id;

        $profile = Profile::findOrFail($user);

        $profile->update($request->all());

        return new JsonResponse(['message' => 'profile updated', 'profile' => $profile]);

    }

    public function follow(Request $request)
    {
        $follower = Auth::user('sanctum');

        $following_id = $request->post('following_id');
        if (!$follower->following($following_id)) {

            $follower->followings()->attach($following_id);
        }

        $following = User::find($following_id);

        $following->notify(new NewFollowerNotification($follower));


        return new JsonResponse(['message' => 'follow done', 'id' => $$following_id]);

    }


}
