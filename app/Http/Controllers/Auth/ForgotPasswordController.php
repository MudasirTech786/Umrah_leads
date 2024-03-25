<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use Carbon\Carbon;
use DB;
use Mail;
use App\Mail\ForgotPasswordEmail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();
        if(!isset($user) || empty($user)) {
            return back()->with('error', 'This email does not exist in the system.');   
        }
        
        $to = $user->email;
        $code = Str::random(32);
            
        $objPass = new \stdClass();
        $objPass->name = $user->name;
        $objPass->email = $user->email;
        $objPass->code = $code;

        try {

            Mail::to($user->email)->send(new ForgotPasswordEmail($objPass));

            DB::table('password_resets')
            ->insert([
                'email' => $to, 
                'token' => $code, 
                'status' => 0,
                'created_at' => Carbon::now(), 
            ]);

        } catch(\Exception $e) {
            
            return back()->with('error', $e->getMessage()); 
        }

        return back()->with('success', 'Password reset email sent successfully.');
    }


}









