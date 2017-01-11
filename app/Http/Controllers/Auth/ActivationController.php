<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\ActivationToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\UserRequestedActivationEmail;

class ActivationController extends Controller
{
    public function activate(ActivationToken $token)
    {
        $token->user()->update([
          'active' => true
        ]);

        $token->delete();

        Auth::login($token->user);

        return redirect('/home');
    }

    public function resend(Request $request) //Grab User
    {

      $user = User::byEmail($request->email)->firstOrFail();


      if($user->active) {  //User is already Active
          return redirect('/');
      }

      event(new UserRequestedActivationEmail($user));

      return redirect('/login')->withInfo('Activation Email resent');

    }


}
