<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function Login(Request $request)
    {
        $request->validate([
            'username' => ['required'], 'password' => ['required']
        ]);

        $user = User::where('username', '=', $request->username)
            ->orWhere('email', '=', $request->email)->first();

        if ($user && Hash::check($request->post('password'), $user->password)) {
            $token =  $user->createToken($request->userAgent(), ['posts', 'followers','profiles']); //userAgent  show type of browser
            return [
                'message' => 'Authenticated',
                'token' => $token->plainTextToken,
                'user' => $user
            ];
        }

        return new JsonResponse([
            'message' => 'Invalid username'
        ], 401);
    }

    public function logout()
    {
        //guards
        $user = Auth::guard('sanctum')->user();

        /*
        //from logout just current device
        $user->currentAccessToken()->delete();
        */

        /*
        //from logout all device
        $user->tokens()->delete();
        */

        
        //from logout all device without current user
        $user->tokens()->where('id', '<>', $user->currentAccessToken()->id)->delete();


        return [
            'message' => 'logout done  '
        ];
    }

    public function user()
    {
        $user = Auth::guard('sanctum')->user();
        return  $user->currentAccessToken();
    }
}
