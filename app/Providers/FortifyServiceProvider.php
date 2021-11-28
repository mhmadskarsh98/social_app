<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // *************************************************
        // Fortify::authenticateUsing(function (Request $request){
        // check if passwoed and email in database then is valid return true else false
        // Auth::attempt([
        //     'email' => 'mhmadskarsh@gmail.com',
        //     'password' => '123456789'
        // ]);

        // // check
        //     $user =User::find(1);
        //     Auth::login($user);

        // $user = User::where('email' , '=' , $request->post('email')->first());

        //         $plain_password = $request->post('password');
        //         if($user && Hash::check($plain_password, $user->passwprd))
        //          {
        //             return $user ;
        //         }
        // });


        /* very important
        if want user pure fortify without jetstream ( jetstream avaliabe view)
        but pure fortify not avaliable view
        but u can tell fortify view >> let's do it
        */

        // Fortify::loginView('auth.login1');
        // Fortify::registerView('auth.register');
        // Fortify::confirmPasswordView('auth.confirm-password');





        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });


    }
}
