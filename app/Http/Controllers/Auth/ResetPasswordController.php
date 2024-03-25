<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;
use DB;
use Mail;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function showResetForm($code)
    {
    
        $reset = DB::table('password_resets')
                    ->where('token', $code)
                    ->orderBy('created_at', 'DESC')
                    ->first();

        if(!isset($reset) || empty($reset)) {
            return redirect()->route('password.request')->with('error', 'Your password reset link appears to be invalid. Please request a new link.');   
        }

        if($reset->status == 1)
        {
            return redirect()->route('password.request')->with('error', 'You have tried to use an old one-time password reset link that has expired. Please request a new link.');
        }

        return view('auth.passwords.reset', compact('reset'));
    }

    public function reset(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email',
            'token' => 'required|string',
            'password' => 'required|string|min:6|max:50|confirmed'
        ]);

        $reset = DB::table('password_resets')
                    ->where('email', $request->email)
                    ->where('token', $request->token)
                    ->orderBy('created_at', 'DESC')
                    ->first();

        if(!isset($reset) || empty($reset)) {
            return redirect()->back()->with('error', 'Your password reset link appears to be invalid. Please request a new link.');
        }

        if($reset->status == 1) {
            return redirect()->back()->with('error', 'You have tried to use an old one-time password reset link that has expired. Please request a new link.');   
        }

        if($request->password == $request->password_confirmation)
        {
            $user = User::where('email', $request->email)->first();

            if(!isset($user) || empty($user)) {
                return redirect()->back()->with('error', 'User not found!');
            }

            $user->password = bcrypt($request->password);
            $user->save();

            DB::table('password_resets')
                ->where('email', $request->email)
                ->where('token', $request->token)
                ->update([
                    'status' => 1
                ]);


            return redirect()->route('login')->with('success', 'Your password has changed successfully.');
        
        } else {
            return redirect()->back()->with('error', 'Password and confirmed password does not match.');   
        }
      
    }
}
